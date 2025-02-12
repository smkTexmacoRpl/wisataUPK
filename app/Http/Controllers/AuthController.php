<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
        ]);
        $log = $request->only('email', 'password');
        if (Auth::attempt($log)) {
            if(Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard');                
            } else if(Auth::user()->role == 'super') {
                return redirect()->route('super.dashboard');
            }else{
                return redirect()->route('dashboard');
            }
        }else {
                return redirect()->route('login')->with('error', 'Email or Password is wrong');
        }
    }
    public function register()
    {
        return view('auth.register');
    }
    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
        ]);
        $log = $request->only('name', 'email', 'password');
        if (Auth::attempt($log)) {
            return redirect()->route('dashboard');
        }else {
                echo "gagal";
                exit();
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
