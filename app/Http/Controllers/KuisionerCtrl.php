<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KuisionerCtrl extends Controller
{
    public function index()
    {
        return view('kuisioner.index');
    }
}
