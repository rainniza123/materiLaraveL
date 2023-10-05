<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
    }

    //form register
    public function register()
    {
        return view('auth.register');
    }
    
    //store register
    public function store(Request $request, User $user, Auth $auth)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users,email',
            'password' => 'required|min:8'
        ]);

        $user::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>Hash::make($request->password)
        ]);

        $credential = $request->only('email', 'password');
        $auth::attempt($credential);
        $request->session()->regenerate();


        return redirect()->route('auth.dashboard')
        ->withSuscces('Anda telah registrasi dan login.!');
    }

    //form login
    public function login()
    {
        return view('auth.login');
    }

    //authentication
    public function authentication(Request $request, Auth $auth)
    { 
        //validasi form input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credential = $request->only('email', 'password');
        if($auth::attempt($credential));
        {
            $request->session()->regenerate();
            return redirect()->route('auth.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email tidak ditemukan',
        ]) ->onlyInput('email');

    }

    //dashboard
    public function dashboard()
    {
        if(Auth::check())
        {
            return view('auth.dashboard');
        }

        return redirect()->route('auth.login');
    }

    //logout
    public function logout(Request $request, Auth $auth)
    {
        $auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }
}
