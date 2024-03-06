<?php

namespace App\Http\Controllers;

use App\Models\ClassroomData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassroomDataController extends Controller
{
    function classromdatashow()
    {
        $ClassroomData = ClassroomData::paginate(10);
        return view('classroomManage', compact('ClassroomData'));
    }


    function classcreate()
    {
        return view('addClassroom');
    }

    function classinsert(Request $request)
    {
        $data = $request->validate(
            [
                'class_id' => 'required|digits:5',
                'level_id' => 'required|digits:2',
                'class_grade' => 'required|max:1',
                'class_num' => 'required|max:2',
                'counselor_id' => 'required|digits:4'
            ]
        );

        DB::table('classroom_data')->insert($data);

        return redirect('/classManage');
    }

    function classedit($class_id)
    {
        $class_info = DB::table('classroom_data')->where('class_id', $class_id)->first();

        return view('editClassroom', compact('class_info'));
    }

    function classupdate(Request $request, $class_id)
    {
        $data = $request->validate(
            [
                'class_id' => 'required|digits:5',
                'level_id' => 'required|digits:2',
                'class_grade' => 'required|max:1',
                'class_num' => 'required|max:2',
                'counselor_id' => 'required|digits:4'
            ]
        );

        DB::table('classroom_data')->where('class_id', $class_id)->update($data);
        return redirect('/classManage');
    }

    function classdel($class_id)
    {
        DB::table('classroom_data')->where('class_id', $class_id)->delete();
        return redirect('/classManage');
    }
}
