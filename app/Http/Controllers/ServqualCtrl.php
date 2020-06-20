<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Kuisioner;
use App\Dimension;
use App\Criteria;

class ServqualCtrl extends Controller
{
    public function company()
    {
        $company = Company::all();

        return view('servqual.company', compact('company'));
    }

    public function detail($id)
    {
        $kuisioner = new Kuisioner;
        $company = Company::where('id', $id)->first();

        $nilai = $kuisioner->servqual($id);
        $criteria = Criteria::all();

        return view('servqual.detail', compact('nilai', 'criteria', 'company'));
    }
}
