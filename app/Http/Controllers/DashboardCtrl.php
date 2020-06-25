<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Assignment;
use App\Kuisioner;
use App\Criteria;
use App\Dimension;
use App\Company;

class DashboardCtrl extends Controller
{
    public function index()
    {
        $assignments = Assignment::with(['checker', 'company'])->get();
        $companies = Company::all();

        return view('dashboard.index', compact('assignments', 'companies'));
    }

    public function chart($id)
    {   

        $kuisioner = new Kuisioner;
        $criteria = Criteria::all();
        $nilai = $kuisioner->servqual($id, 'all');

        foreach($criteria as $key => $data){
            $hasil[$key]['id'] = $key +1;
            $hasil[$key]['nilai'] = number_format($nilai['ratakenyataan'][$data->id] - $nilai['rataharapan'][$data->id], 2);
            $hasil[$key]['ket'] = $data->content;
            $hasil[$key]['code'] = $data->code;
        }

        return response()->json($hasil);
    }

    public function chartDimensi($id)
    {
        $kuisioner = new Kuisioner;
        $dimensi = Dimension::with(['criteria'])->get();

        $nilai = $kuisioner->dimensiNilai($id, 'all');
        foreach($dimensi as $key => $data){
            $hasil[$key]['id'] = $data->id;
            $hasil[$key]['nilai'] = number_format($nilai['ratakenyataan'][$data->id] - $nilai['rataharapan'][$data->id], 2);
            $hasil[$key]['name'] = $data->name .'('. $data->description .')';
        }

        return response()->json($hasil);
    }
}
