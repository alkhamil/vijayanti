<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Kuisioner;
use App\Assignment;
use App\Dimension;
use App\Criteria;
use Auth;

class ResultCtrl extends Controller
{
    public function index()
    {
        $kuisioner = new Kuisioner;

        $auth = Auth::user();
        $user = Company::where('user_id', $auth->id)->first();
        $id = empty($user) ? 0 : $user->id;

        $nilai = $kuisioner->servqual($id, 'all');
        $nilaiDimensi = $kuisioner->dimensiNilai($id, 'all');
        $keterangan = $kuisioner;
        $criteria = Criteria::all();
        $dimensi = Dimension::with(['criteria'])->get();
        // $assign = Assignment::where('checker_id', $id)->with(['company'])->get();
        
        return view('result.index', compact('nilai', 'criteria', 'nilaiDimensi', 'keterangan', 'dimensi'));
    }
}
