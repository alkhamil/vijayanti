<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class LoginCtrl extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login_proses(Request $req)
    {
        $user = User::where('username', $req->username)->first();
        if ($user !== null) {
            if (password_verify($req->password, $user->password)) {
                Auth::attempt(['username' => $req->username, 'password' => $req->password]);
                return redirect('dashboard');
            }else {
                return back()->with('msg', 'Password salah!');
            }
        }else {
            return back()->with('msg', 'Akun tidak ditemukan!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
