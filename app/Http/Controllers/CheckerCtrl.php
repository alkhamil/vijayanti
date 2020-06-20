<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;
use Hash;
use App\Checker;
use App\User;

class CheckerCtrl extends Controller
{
    public function index()
    {
        $checkers = Checker::all();
        return view('checker.index', compact('checkers'));
    }

    public function tambah(Request $request)
    {
        $checkerExt = User::where('role_id', '2')->get()->count();
        $checkerExt++;
        $birthday = explode('-',$request->birthday);
        $reverseBirthday = $birthday[2].$birthday[1].$birthday[0];
        $patternUsername = "CK".$checkerExt.$reverseBirthday;
        $patternPassword = Hash::make("CK".$checkerExt.$reverseBirthday);

        $user = new User;
        $user->role_id = 2;
        $user->username = $patternUsername;
        $user->email = $request->email;
        $user->password = $patternPassword;
        if ($user->save()) {
            $checker = new Checker;
            $checker->user_id = $user->id;
            $checker->name = Str::upper($request->name);
            $checker->birthday = $request->birthday;
            $checker->email = $request->email;
            $checker->phone = $request->phone;
            $checker->status = 0; // sedang tidak mantau
            $checker->save();
            return redirect('checker')->with('msg', 'Data checker berhasil dibuat!');
        }

    }

    public function edit(Request $request)
    {
        $checker = Checker::where('id', $request->checker_id)->first();
        if ($checker) {
            $checker->name = Str::upper($request->name);
            $checker->phone = $request->phone;
            $checker->save();
            return redirect('checker')->with('msg', 'Data checker berhasil diedit!');
        }
    }

    public function hapus(Request $request, $id)
    {
        $checker = Checker::where('id', $id)->first();
        if ($checker) {
            $user = User::where('id', $checker->user_id)->first();
            if ($user !== null) {
                $user->delete();
            }
            $checker->delete();
            return redirect('checker')->with('msg', 'Data checker dan user berhasil dihapus!');
        }
    }
}
