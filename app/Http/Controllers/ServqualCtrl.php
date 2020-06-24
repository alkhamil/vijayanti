<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Kuisioner;
use App\Assignment;
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
        $company = Company::where('id', $id)->first();
        $assign = Assignment::where('company_id', $id)->with(['checker','company'])->get();
        $kuisioner = new Kuisioner;

        $nilai = $kuisioner->servqual($id, 'all');
        $nilaiDimensi = $kuisioner->dimensiNilai($id, 'all');
        $keterangan = $kuisioner;
        $criteria = Criteria::all();
        $dimensi = Dimension::with(['criteria'])->get();

        return view('servqual.detail', compact('assign', 'nilai', 'criteria', 'nilaiDimensi', 'keterangan', 'dimensi', 'company'));
    }

    public function nilai($id)
    {
        $kuisioner = new Kuisioner;

        $nilai = $kuisioner->servqual($id, 'periode');
        $nilaiDimensi = $kuisioner->dimensiNilai($id, 'periode');
        $keterangan = $kuisioner;
        $criteria = Criteria::all();
        $dimensi = Dimension::with(['criteria'])->get();

        return view('servqual.nilai', compact('nilai', 'criteria', 'nilaiDimensi', 'keterangan', 'dimensi'));
    }
}
