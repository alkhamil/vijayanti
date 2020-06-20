<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;
use Hash;
use App\Company;
use App\User;

class PerusahaanCtrl extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('perusahaan.index', compact('companies'));
    }

    public function tambah(Request $request)
    {
        $companyExt = User::where('role_id', '3')->get()->count();
        $companyExt++;
        $date_standing = explode('-',$request->date_standing);
        $reversedate_standing = $date_standing[2].$date_standing[1].$date_standing[0];
        $patternUsername = "PT".$companyExt.$reversedate_standing;
        $patternPassword = Hash::make("PT".$companyExt.$reversedate_standing);
        $user = new User;
        $user->role_id = 3;
        $user->username = $patternUsername;
        $user->email = $request->email;
        $user->password = $patternPassword;

        if ($user->save()) {
            $company = new Company;
            $company->user_id = $user->id;
            $company->name = Str::upper($request->name);
            $company->date_standing = $request->date_standing;
            $company->region = $request->region;
            $company->phone = $request->phone;
            $company->email = $request->email;
            $company->address = $request->address;
            $company->status = 0; // tidak sedang di pantau
            $company->save();
            return redirect('perusahaan')->with('msg', 'Data perusahaan dan akun berhasil dibuat!');
        }

    }

    public function edit(Request $request)
    {
        $company = company::where('id', $request->company_id)->first();
        if ($company) {
            $company->name = Str::upper($request->name);
            $company->region = $request->region;
            $company->phone = $request->phone;
            $company->address = $request->address;
            $company->status = 0; // tidak sedang di pantau
            $company->save();
            return redirect('perusahaan')->with('msg', 'Data perusahaan berhasil diedit!');
        }
    }

    public function hapus(Request $request, $id)
    {
        $company = Company::where('id', $id)->first();
        if ($company !== null) {
            $user = User::where('id', $company->user_id)->first();
            if ($user !== null) {
                $user->delete();
            }
            $company->delete();
            return redirect('perusahaan')->with('msg', 'Data perusahaan dan user berhasil dihapus!');
        }
    }
}
