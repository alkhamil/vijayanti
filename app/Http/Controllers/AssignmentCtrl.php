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
        $assignments = Assignment::with(['checker', 'company'])->get();
        $companies = Company::where('status', 0)->get();
        $checkers = Checker::where('status', 0)->get();
        return view('assignment.index', compact('assignments', 'companies', 'checkers'));
    }

    public function tambah(Request $request)
    {   
        $periode = explode('-', $request->periode);
        $assignmentExt = Assignment::all()->count();
        $assignmentExt++;
        $codeAssignment = 'SK/'.time().'/'.$assignmentExt;
        $assignment = new Assignment;
        $assignment->code = $codeAssignment;
        $assignment->bulan = $periode[0];
        $assignment->tahun = $periode[1];
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

    public function done(Request $request, $id)
    {
        $assignment = Assignment::where('id', $id)->first();
        if ($assignment !== null) {
            $assignment->status = 1;
            if ($assignment->save()) {
                $checker = Checker::where('id', $assignment->checker_id)->first();
                $checker->status = 0;
                $checker->save();

                $company = Company::where('id', $assignment->company_id)->first();
                $company->status = 0;
                $company->save();
            }
            return redirect('assignment')->with('msg', 'Tugas '.$assignment->code.' Selesai');
        }
    }
}
