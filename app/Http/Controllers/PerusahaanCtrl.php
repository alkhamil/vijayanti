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
        $company = new Company;
        $company->name = Str::upper($request->name);
        $company->region = $request->region;
        $company->phone = $request->phone;
        $company->email = $request->email;
        $company->address = $request->address;
        $company->status = 0; // tidak sedang di pantau
        $company->save();
        return redirect('perusahaan')->with('msg', 'Data perusahaan dan akun berhasil dibuat!');
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
