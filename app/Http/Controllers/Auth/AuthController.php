<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Str;
class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function simpanRegister(Request $request)
    {
        User::create
        ([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'owner',
            'remember_token' => Str::random(20),
        ]);
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/detailtransaksi');
        }
        return redirect(route('login'))->with('gagal', 'Username atau Password salah');
    }

    public function logout()
    {
        Auth::logout();

        return redirect(route('login'));
    }
}
