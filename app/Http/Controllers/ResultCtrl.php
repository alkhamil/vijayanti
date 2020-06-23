<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultCtrl extends Controller
{
    public function index()
    {
        return view('result.index');
    }
}
