<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function showLoginForm()
    {
        return view('auth.login'); // Make sure to create this view
    }

    // Handle login attempt
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->intended('/dashboardAdmin');
            } elseif ($user->role === 'student') {
                return redirect()->intended('/dashboard');
            }

            
        }

        return redirect()->back()->with('error', 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');
        
    }

    public function logout(Request $request)
    {
        Auth::logout();

        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
