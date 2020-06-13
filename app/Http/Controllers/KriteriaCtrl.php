<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KriteriaCtrl extends Controller
{
    public function index()
    {
        return view('kriteria.index');
    }
}
