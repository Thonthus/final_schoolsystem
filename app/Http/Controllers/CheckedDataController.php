<?php

namespace App\Http\Controllers;

use App\Models\CheckedData;
use App\Models\StudentData;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class CheckedDataController extends Controller
{
    function scaninview()
    {
        return view('scanin');
    }

    function scanoutview()
    {
        return view('scanout');
    }

    function scanIninsert(Request $request)
    {
        $request->validate(
            [
                'student_id' => 'required|digits:5|exists:student_data,student_id'
            ],
            [
                'student_id.required' => 'กรุณากรอกรหัสประจำตัวนักเรียน',
                'student_id.digits' => 'รหัสประจำตัวนักเรียนต้องเป็นตัวเลข 5 หลัก',
                'student_id.exists' => 'ไม่พบข้อมูล กรอกใหม่อีกครั้งหากยังไม่สำเร็จโปรดติดต่อเจ้าหน้าที่'


            ]
        );

        $today = Carbon::today()->toDateString();
        $exists = CheckedData::where('student_id', $request->student_id)
            ->whereDate('date', $today)
            ->whereNotNull('time_checked_in')
            ->exists();

        if (!$exists) {
            $status = Carbon::now()->format('H:i:s') < '08:15:00' ? 'มาเช้า' : 'มาสาย';
            $data = [
                'student_id' => $request->student_id,
                'date' => $today,
                'time_checked_in' => Carbon::now()->toTimeString(),
                'status' => $status,
                'created_at' => Carbon::now()
            ];

            CheckedData::insert($data);

            $student = StudentData::where('student_id', $request->student_id)->first();
            $studentName = $student ? $student->firstname . ' ' . $student->lastname : 'Unknown';
            $studentImg = $student ? $student->student_img : 'loginhead.png';

            return redirect()->back()->with([
                'success' => 'ยินดีต้อนรับ ' . $studentName,
                'student_img' => $studentImg,
            ]);
        } else {
            $student = StudentData::where('student_id', $request->student_id)->first();
            $studentName = $student ? $student->firstname . ' ' . $student->lastname : 'Unknown';
            $studentImg = $student ? $student->student_img : 'loginhead.png';

            return redirect()->back()->with([
                'success' => 'ยินดีต้อนรับ ' . $studentName,
                'student_img' => $studentImg,
            ]);
        }
    }

    function scanOutinsert(Request $request)
    {
        $request->validate([
            'student_id' => 'required|digits:5|exists:student_data,student_id',
        ], [
            'student_id.required' => 'กรุณากรอกรหัสประจำตัวนักเรียน',
            'student_id.digits' => 'รหัสประจำตัวนักเรียนต้องเป็นตัวเลข 5 หลัก',
            'student_id.exists' => 'ไม่พบข้อมูล กรอกใหม่อีกครั้งหากยังไม่สำเร็จโปรดติดต่อเจ้าหน้าที่',
        ]);

        $today = Carbon::today()->toDateString();
        $nowTime = Carbon::now()->toTimeString();

        $checkedData = CheckedData::where('student_id', $request->student_id)
            ->whereDate('date', $today)
            ->first();

        if ($checkedData) {
            if (is_null($checkedData->time_checked_out)) {
                $checkedData->time_checked_out = $nowTime;
                $checkedData->save();
            }
        } else {
            CheckedData::create([
                'student_id' => $request->student_id,
                'date' => $today,
                'time_checked_out' => $nowTime,
                'status' => 'มาสาย',
            ]);
        }

        $student = StudentData::where('student_id', $request->student_id)->first();
        $studentName = $student ? $student->firstname . ' ' . $student->lastname : 'Unknown';
        $studentImg = $student ? $student->student_img : 'loginhead.png';

        return redirect()->back()->with([
            'success' => 'เดินทางกลับโดยสวัสดิภาพ ' . $studentName,
            'student_img' => $studentImg,
        ]);
    }



    function checkedshow()
    {
        $checkedData = CheckedData::with('student')->paginate(5);

        return view('admincheckedshow', compact('checkedData'));
    }

    function studentcheckedhistory()
    {
        $username = Auth::user()->username;
        $checkedData = CheckedData::with('student')
            ->whereHas('student', function ($query) use ($username) {
                $query->where('student_id', $username);
            })
            ->paginate(5);

        return view('studentcheckedshow', compact('checkedData'));
    }

    function checkedfindhistory(Request $request)
    {
        $student_id = $request->student_id;
        $data = CheckedData::where('student_id', $student_id)->with('student')->get();
        return view('checkedfind', compact('data'));
    }



   
}
