<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Kuisioner;
use App\Assignment;
use App\Dimension;
use App\Criteria;
use PDF;

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

    public function cetak_semua($id)
    {
        $company = Company::where('id', $id)->first();
        $assign = Assignment::where('company_id', $id)->with(['checker','company'])->get();
        $kuisioner = new Kuisioner;

        $nilai = $kuisioner->servqual($id, 'all');
        $nilaiDimensi = $kuisioner->dimensiNilai($id, 'all');
        $keterangan = $kuisioner;
        $criteria = Criteria::all();
        $dimensi = Dimension::with(['criteria'])->get();
        $pdf = PDF::loadview('servqual.cetak_semua', compact('assign', 'nilai', 'criteria', 'nilaiDimensi', 'keterangan', 'dimensi', 'company'));
        return $pdf->stream();
    }

    public function cetak_periode($id)
    {
        $kuisioner = new Kuisioner;
        $assign = Assignment::where('id', $id)->with(['checker','company'])->first();

        $nilai = $kuisioner->servqual($id, 'periode');
        $nilaiDimensi = $kuisioner->dimensiNilai($id, 'periode');
        $keterangan = $kuisioner;
        $criteria = Criteria::all();
        $dimensi = Dimension::with(['criteria'])->get();

        $pdf = PDF::loadview('servqual.cetak_periode', compact('nilai', 'criteria', 'nilaiDimensi', 'keterangan', 'dimensi', 'assign'));
        return $pdf->stream();
    }
}
