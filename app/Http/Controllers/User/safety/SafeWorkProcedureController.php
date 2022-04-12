<?php


namespace App\Http\Controllers\User\safety;


use App\Http\Controllers\Controller;
use App\Models\l_ppe;
use App\Models\safety_work_procedure;
use Auth;
use DB;
use Illuminate\Http\Request;


class SafeWorkProcedureController extends Controller
{
    public function index(){

        $user=Auth::user();
        $ppe = l_ppe::all();

       return view('dashboards.users.SafeWorkProcedure.index',compact('user','ppe'));
    }

    public function store(Request $request){


        $request->validate([
            'work_title' => 'required',
            'before_work' => 'required',
            'during_work' => 'required',
            'after_work' => 'required',
            'potential_hazard' => 'required',
            'ppe_name' => 'required',
            'remarks' => 'required',
        ]);

        $input =new safety_work_procedure();
        $input->work_title = $request->input('work_title');
        $input->before_work_rules = $request->input('before_work');
        $input->during_work_rules = $request->input('during_work');
        $input->after_work_rules = $request->input('after_work');
        $input->potential_hazard = $request->input('potential_hazard');
        $input->ppe = $request->input('ppe_name');
        $input->remarks = $request->input('remarks');


        if ($before_work_image = $request->file('before_work_image')) {
            $destinationPath = 'image/SafetyWorkProcedure/beforeWork';
            $beforeWorkImage = date('YmdHis') . "." . $before_work_image->getClientOriginalExtension();
            $before_work_image->move($destinationPath, $beforeWorkImage);
            $input['before_work_image'] = "$beforeWorkImage";
        }

        if ($during_work_image = $request->file('during_work_image')) {
            $destinationPath = 'image/SafetyWorkProcedure/duringWork';
            $duringImage = date('YmdHis') . "." . $during_work_image->getClientOriginalExtension();
            $during_work_image->move($destinationPath, $duringImage);
            $input['during_work_image'] = "$duringImage";
        }

        if ($after_work_image = $request->file('after_work_image')) {
            $destinationPath = 'image/SafetyWorkProcedure/afterWork';
            $afterImage = date('YmdHis') . "." . $after_work_image->getClientOriginalExtension();
            $after_work_image->move($destinationPath, $afterImage);
            $input['after_work_image'] = "$afterImage";
        }
        if ($potential_hazard_image = $request->file('potential_hazard_image')) {
            $destinationPath = 'image/SafetyWorkProcedure/potentialHazard';
            $potentialImage = date('YmdHis') . "." . $potential_hazard_image->getClientOriginalExtension();
            $potential_hazard_image->move($destinationPath, $potentialImage);
            $input['potential_hazard_image'] = "$potentialImage";
        }

        $input->save();
        return redirect()->back()->with(['success'=>'Form is successfully submitted!']);
    }

}
