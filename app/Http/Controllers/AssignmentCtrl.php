<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assignment;
use App\Company;
use App\Checker;

class AssignmentCtrl extends Controller
{
    public function index()
    {
        $assignments = Assignment::all();
        $companies = Company::where('status', 0)->get();
        $checkers = Checker::where('status', 0)->get();
        return view('assignment.index', compact('assignments', 'companies', 'checkers'));
    }

    public function tambah(Request $request)
    {
        $assignment = new Assignment;
        $assignment->checker_id = $request->checker_id;
        $assignment->company_id = $request->company_id;
        if ($assignment->save()) {
            $checker = Checker::where('id', $request->checker_id)->first();
            $checker->status = 1; // sedang mantau
            $checker->save();

            $company = Company::where('id', $request->company_id)->first();
            $company->status = 1; // sedang dipantau
            $company->save();
            return redirect('assignment')->with('msg', 'Data assignment berhasil dibuat!');
        }
    }
}
