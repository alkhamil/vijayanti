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
                if ($user->role_id == 1) {
                    return redirect('dashboard');
                }else if($user->role_id == 2){
                    return redirect('survey');
                }
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
