<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dimension;
use App\Assignment;
use App\Checker;
use App\Company;
use App\Criteria;
use App\Kuisioner;
use Auth;

class SurveyCtrl extends Controller
{
    public function index()
    {
        $auth = Auth::user();
        $user = Checker::where('user_id', $auth->id)->first();
        $id = empty($user) ? 0 : $user->id;
        $assign = Assignment::where('checker_id', $id)->with(['company'])->get();
        
        return view('survey.index', compact('assign'));
    }

    public function survey($id)
    {   
        $company = Assignment::where('id', $id)->with(['company'])->first();
        $dimensions = Dimension::with(['criteria'])->get();
        
        return view('survey.survey', compact('dimensions', 'company'));
    }

    public function survey_create(Request $request)
    {
        $criteria = Criteria::all();
        $auth = Auth::user();
        $user = Checker::where('user_id', $auth->id)->first();

        $assign = Assignment::where('id', $request->assign_id)->first();
        $assign->status = 1;
        if ($assign->save()) {
            foreach($criteria as $data){
                $kuisioner = new Kuisioner;
                $kuisioner->user_id = $user->id;
                $kuisioner->assignment_code = $assign->code;
                $kuisioner->company_id = $request->company_id;
                $kuisioner->criteria_id = $data->id;
                $kuisioner->kenyataan = empty($request->k[$data->id]) ? 0 : $request->k[$data->id];
                $kuisioner->harapan = empty($request->h[$data->id]) ? 0 : $request->h[$data->id];
                $kuisioner->save();
            }
        }

        return redirect('survey')->with('msg', 'Data dimensi berhasil dibuat!');
    }

    public function detail($id)
    {   
        $assign = Assignment::where('id', $id)->with(['company'])->first();
        $kuisioner = Kuisioner::where('user_id', $assign->checker_id)->where('company_id', $assign->company_id)->with(['criteria'])->get();

        return view('survey.detail', compact('kuisioner', 'assign'));
    }

}
