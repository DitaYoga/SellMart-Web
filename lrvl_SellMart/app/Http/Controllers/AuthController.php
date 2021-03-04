<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        if(Auth::user()){
            return redirect('/');
        }
        return view('auth.register');
    }

    public function register_process(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
            'level' => 'user'
        ]);
        return redirect('/');
    }

    public function login()
    {
        if(Auth::user()){
            return redirect('/');
        }
        return view('auth.login');
    }

    public function login_process(Request $request)
    {
        $request->request->add(['level' => 'user']);
        if(Auth::attempt($request->only('name','password','level'))){
            session()->put('login','login');
            return redirect('/');
        } elseif (Auth::attempt($request->only('name','password'))) {
            return redirect('/dashboard');
        }
        return redirect('/login');
    }

    public function logout()
    {
        session()->forget('login');
        Auth::logout();
        return redirect('/');
    }

    public function index()
    {
        return view('index');
    }


    public function profile()
    {
        return view('profile');
    }

    public function editprofile()
    {
        return view ('editprofile');
    }
}
