<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     function addadminview()
    {
        return view('addAdmin');
    }

    function storesadmin(Request $request)
    {
        $validated = $request->validate(
            [
                'username' => 'required',
                'password' => 'required|min:8'
            ],
            [
                'username.required' => 'กรุณากรอกชื่อผู้ใช้',
                'password.required' => 'กรุณากรอกรหัสผ่าน',
                'password.min' => 'รหัสผ่านความยาวขั้นต่ำ 8 ตัว'
            ]
        );

        $data = [
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role'     => 'admin' 
        ];

        User::create($data);

        return redirect()->back()->with([
            'success' => 'สร้างบัญชีผู้ดูแลระบบ ' . $request->username . ' สำเร็จ'
        ]);
    }

}
