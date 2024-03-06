<?php

namespace App\Http\Controllers;

use App\Models\CounselorData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CounselorDataController extends Controller
{
    function counselordatashow()
    {
        $CounselorData = CounselorData::paginate(10);
        return view('counselorManage', compact('CounselorData'));
    }

    function counselorcreate()
    {
        return view('addCounselor');
    }

    function counselorinsert(Request $request)
    {
        $data = $request->validate(
            [
                'counselor_id' => 'required|digits:4',
                'counselor_name' => 'required',
                'counselor_tel' => 'required|max:10'
            ]
        );

        DB::table('counselor_data')->insert($data);

        return redirect('/counselorManage');
    }

    function counseloredit($counselor_id)
    {
        $counselor_info = DB::table('counselor_data')->where('counselor_id', $counselor_id)->first();

        return view('editCounselor', compact('counselor_info'));
    }

    function counselorupdate(Request $request, $counselor_id)
    {
        $data = $request->validate(
            [
                'counselor_id' => 'required|digits:4',
                'counselor_name' => 'required',
                'counselor_tel' => 'required|max:10'
            ]
        );

        DB::table('counselor_data')->where('counselor_id', $counselor_id)->update($data);
        return redirect('/counselorManage');
    }

    function counselordel($counselor_id)
    {
        DB::table('counselor_data')->where('counselor_id', $counselor_id)->delete();
        return redirect('/counselorManage');
    }
    

}
