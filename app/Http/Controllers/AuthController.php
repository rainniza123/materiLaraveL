<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
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
    public function store(Request $request, User $user, Auth $auth, Profile $profile)
    {
        $request->validate([
            'name'  =>  'required|string|max:250',
            'email' =>  'required|email|max:250|unique:users,email',
            'password'  =>  'required|min:8',
            'umur' => 'required',
            'bio' => 'required|min:10',
            'alamat' => 'required|min:10'
        ]);


        //save data user
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        //save data profile
        $profile->bio = $request->bio;
        $profile->alamat = $request->alamat;
        $profile->umur = $request->umur;
        $profile->user_id = $user->id;
        $profile->save();


        $scredential = $request->only('email', 'password');
        $auth::attempt($scredential);
        $request->session()->regenerate();
        return redirect()->route('auth.dashboard')
        ->withSuccess('Anda telah registrasi dan login!');
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
            'password' => 'required',
        ]);

        //proses autentikasi
        $scredential = $request->only('email', 'password');
        if ($auth::attempt($scredential))
        {
            $request->session()->regenerate();
            return redirect()->route('auth.dashboard');
        }

        // jika proses authentikasi gagal 
        return back()->withErrors([
            'email' => 'Email atau password tidak ditemukan',
        ])->onlyInput('email');

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

    public function profile(User $user)
    {
        return view('auth.profile',compact($user));
    }
    
}
