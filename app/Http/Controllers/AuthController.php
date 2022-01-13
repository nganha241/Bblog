<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function submitLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if(Auth::attempt([
            'password' => $password,
            'email' => $email,
        ])) {
            return redirect()->route('dashboard');
        }
        else {
            return back()->withError('Tên tài khoản hoặc mật khẩu không đúng');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
