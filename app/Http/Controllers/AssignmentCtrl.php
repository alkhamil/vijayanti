<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assignment;
use App\Company;
use App\Checker;
use App\Kuisioner;
use App\Criteria;
use App\Dimension;
use DB;
use Mail;
use PDF;
use App\Mail\HasilSurvey;
use Storage;

class AssignmentCtrl extends Controller
{
    public function index()
    {
        $assignments = Assignment::orderBy('id', 'DESC')->with(['checker', 'company'])->get();
        $companies = Company::where('status', 0)->get();
        $checkers = Checker::where('status', 0)->get();
        return view('assignment.index', compact('assignments', 'companies', 'checkers'));
    }

    public function tambah(Request $request)
    {  
        $periode = explode('-', $request->periode);
        $cek = DB::table('assignments')
                    ->where('bulan', $periode[0])
                    ->where('tahun', $periode[1])
                    ->where('company_id', $request->company_id)
                    ->get();
        if (count($cek) > 0) {
            $checkerName = Checker::where('id', $request->checker_id)->first()->name;
            $companyName = Company::where('id', $request->company_id)->first()->name;
            return redirect('assignment')->with('info', $companyName.' Sudah dilakukan survey pada bulan '.$request->periode.'. Silahkan buat data lain!');
        }else {
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
    }

    public function done(Request $request, $id)
    {   
        $kuisioner = new Kuisioner;
        $assign = Assignment::where('id', $id)->with(['checker','company'])->first();
        $nilai = $kuisioner->servqual($id, 'periode');
        $nilaiDimensi = $kuisioner->dimensiNilai($id, 'periode');
        $keterangan = $kuisioner;
        $criteria = Criteria::all();
        $dimensi = Dimension::with(['criteria'])->get();
        $pdf = PDF::loadview('servqual.cetak_periode', compact('nilai', 'criteria', 'nilaiDimensi', 'keterangan', 'dimensi', 'assign'));
        $patternFileName = $assign->company->name.'_'.$assign->bulan.'_'.$assign->tahun.'_('.$assign->checker->name.')';
        Storage::put('/pdf/'.$patternFileName.'.pdf', $pdf->output());
        $data['assignment'] = $assign;
        $data['filename'] = $patternFileName;
        Mail::to($assign->company->email)->send(new HasilSurvey($data));
        if ($assign !== null) {
            $assign->status = 1;
            if ($assign->save()) {
                $checker = Checker::where('id', $assign->checker_id)->first();
                $checker->status = 0;
                $checker->save();

                $company = Company::where('id', $assign->company_id)->first();
                $company->status = 0;
                $company->save();
            }
            return redirect('assignment')->with('msg', 'Tugas '.$assign->code.' Selesai dan hasil survei telah dikirim via email ke '.$assign->company->name);
        }
    }

    public function hapus(Request $request, $id)
    {
        $assign = Assignment::where('id', $id)->with('kuisioner')->first();
        $checker = Checker::where('id', $assign->checker_id)->first();
        $checker->status = 0;
        $checker->save();
        $company = Company::where('id', $assign->company_id)->first();
        $company->status = 0;
        $company->save();
        if (count($assign->kuisioner) > 0) {
            foreach ($assign->kuisioner as $key => $value) {
                $value->delete();
            }
        }
        $assign->delete();
        return redirect('assignment')->with('msg', 'Data terhapus');
    }
}
