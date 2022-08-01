<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class Authcontroller extends Controller
{
    public function list()
    {
        return view('auth.login');
    }
    public function post(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.getlogin');
    }
    public function registerindex()
    {
        return view('auth.register');
    }
    public function registercreate(RegisterRequest $request)
    {
        $user = new User();
        $user->fill($request->all(), [
            'password' => Hash::make($request->password)
        ])->save();
        return redirect()->route('auth.getlogin')->with('thongbao', 'đăng ký thành công');
    }
}
