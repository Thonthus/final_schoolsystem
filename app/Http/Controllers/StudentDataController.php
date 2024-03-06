<?php

namespace App\Http\Controllers;

use App\Models\StudentData;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class StudentDataController extends Controller
{
    function studentsdata()
    {
        $StudentsData = StudentData::paginate(10);
        return view('adminShowStudent', compact('StudentsData'));
    }

    function storeimageview()
    {
        return view('storeimg');
    }

    function storeimage(Request $request, StudentData $studentData)
    {
        $student_id = $request->student_id;
        $studentData = StudentData::where('student_id', $student_id)->first();

        $request->validate(
            [
                'student_id' => 'required|digits:5|exists:student_data,student_id'
            ],
            [
                'student_id.required' => 'กรุณากรอกรหัสประจำตัวนักเรียน',
                'student_id.digits' => 'รหัสประจำตัวนักเรียนต้องเป็นตัวเลข 5 หลัก',
                'student_id.exists' => 'ไม่พบข้อมูล ' . $request->student_id
            ]
        );

        if ($request->hasFile('student_img')) {
            $file = $request->file('student_img');
            $filename = $student_id . '.' . $file->getClientOriginalExtension();
            $path = 'public/studentimgs/' . $filename;

            if (Storage::exists($path)) {
                Storage::delete($path);
            }

            $file->storeAs('public/studentimgs', $filename);

            $studentData->student_img = $filename;
            $studentData->save();
        }
        return redirect()->back()->with([
            'success' => 'เพิ่ม/แก้ไขรูปภาพของ ' . $student_id . ' สำเร็จ'
        ]);
    }


    function addstudentview()
    {
        return view('addStudent');
    }

    function storestudent(Request $request)
    {
        $validated = $request->validate(
            [
                'student_id' => 'required|digits:5',
                'class_id' => 'required|digits:5',
                'number' => 'required|max:2',
                'firstname' => 'required|string|max:50',
                'lastname' => 'required|string|max:50',
                'nickname' => 'required|max:10',
                'birthdate' => 'required|date',
                'gender' => 'required|max:1',
                'personal_id' => 'required|digits:13',
                'address' => 'required|string',
                'phone' => 'required|max:10',
                'email' => 'required|email',
            ],

        );

        StudentData::create($validated);


        $data = [
            'username' => $request->student_id,
            'password' => Hash::make($request->personal_id),
            'role'     => 'student'
        ];

        User::create($data);

        return redirect()->back()->with([
            'success' => 'บักทึกข้อมูลและสร้างบัญชีผู้ใช้นักเรียนรหัสประจำตัว ' . $request->student_id . ' สำเร็จ',
        ]);;
    }

    function editstudentview()
    {
        return view('editStudent');
    }

    function editstudentpreup($student_id)
    {
        $studentData = StudentData::where('student_id', $student_id)->first();
        return view('editStudentInfo', compact('studentData'));
    }


    public function updatestudent(Request $request, $student_id)
    {
        $student = StudentData::where('student_id', $student_id)->first();
        $user = User::where('username', $student_id)->first();

        $validated = $request->validate([
            'student_id' => 'required|digits:5',
            'class_id' => 'required|string|max:5',
            'number' => 'required|string',
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'nickname' => 'required|max:10',
            'birthdate' => 'required|date',
            'gender' => 'required|max:1',
            'personal_id' => 'required|max:13',
            'address' => 'required|string',
            'phone' => 'required|max:10',
            'email' => 'required|email',
        ]);


        $student->update($validated);

        if (!empty($request->personal_id)) {
            $user->password = Hash::make($request->personal_id);
            $user->save();
        }

        return redirect()->back()->with('success', 'แก้ไขข้อมูลส่วนตัวและบัญชีผู้ใช้นักเรียนรหัสประจำตัว ' . $request->student_id . ' สำเร็จ');
    }

    function studentdel($student_id)
    {
        DB::table('student_data')->where('student_id', $student_id)->delete();
        DB::table('checked_data')->where('student_id', $student_id)->delete();
        DB::table('users')->where('username', $student_id)->delete();
        return redirect('/studentinfoAdmin');
    }

    function studentinfoadminview(Request $request)
    {
        if ($request->has('student_id')) {
            $request->validate([
                'student_id' => 'required|digits:5|exists:student_data,student_id',
            ], [
                'student_id.required' => 'กรุณากรอกรหัสประจำตัวนักเรียน',
                'student_id.digits' => 'รหัสประจำตัวนักเรียนต้องเป็นตัวเลข 5 หลัก',
                'student_id.exists' => 'ไม่พบข้อมูลนักเรียน ' . $request->student_id,
            ]);
        }


        $student_id = $request->student_id;
        $student = DB::table('student_data')->where('student_id', $student_id)->first();

        if ($student) {
            $classroom = DB::table('classroom_data')->where('class_id', $student->class_id)->first();

            if ($classroom) {
                $counselor = DB::table('counselor_data')->where('counselor_id', $classroom->counselor_id)->first();
                $level = DB::table('level_data')->where('level_id', $classroom->level_id)->first();
            }
        }

        if ($student && $classroom) {
            $student->classroom = $classroom;

            if ($counselor) {
                $student->classroom->counselor = $counselor;
            }


            if (isset($level)) {
                $student->classroom->level = $level;
            }
        }

        return view('studentInfoAdmin', compact('student'));
    }

    public function studentinfoview()
    {
        if (auth()->check()) {
            $username = auth()->user()->username;
            $student_id = $username;

            $student = DB::table('student_data')->where('student_id', $student_id)->first();

            if ($student) {
                $classroom = DB::table('classroom_data')->where('class_id', $student->class_id)->first();

                if ($classroom) {
                    $counselor = DB::table('counselor_data')->where('counselor_id', $classroom->counselor_id)->first();
                    $level = DB::table('level_data')->where('level_id', $classroom->level_id)->first();
                }
            }

            if ($student && $classroom) {
                $student->classroom = $classroom;

                if ($counselor) {
                    $student->classroom->counselor = $counselor;
                }


                if (isset($level)) {
                    $student->classroom->level = $level;
                }
            }

            return view('studentInfo', compact('student'));
        } else {
            redirect('/');
        }
    }
}
