<?php


namespace App\Http\Controllers\User\safety;
use App\Http\Controllers\Controller;
use App\Models\l_ppe;
use App\Models\s_work_procedure;
use Auth;
use DB;
use Illuminate\Http\Request;


class SafeWorkProcedureController extends Controller
{
    public function index(Request $request){
        $user=Auth::user();
        $ppe = l_ppe::all();
        // DB::table('s_work_procedures as swp')
        // ->leftJoin('l_ppe as pp', 'swp.id', '=', 'pp.id')
        // ->get();
        // $data=s_work_procedure::all();
       $values=s_work_procedure::orderby('id','desc')->get();
       return view('dashboards.users.SafeWorkProcedure.index',compact('user','ppe','values'));
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
         $input = new s_work_procedure();
        $input->work_title = $request->input('work_title');
        $input->before_work_rules = $request->input('before_work');
        $input->during_work_rules = $request->input('during_work');
        $input->after_work_rules = $request->input('after_work');
        $input->potential_hazard = $request->input('potential_hazard');
        $input['ppe']= json_encode($request->input('ppe_name'));
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
        return back();
    }

    public function swpView($id){
        $user=Auth::user();
       $values= s_work_procedure::where('id','=',$id)->first();
        return view('dashboards.users.SafeWorkProcedure.swpdetails',compact('values','user'));
    }
    public function edit($id){
        $user=Auth::user();
        $ppe = l_ppe::all();
        $values= s_work_procedure::all();
        $data= s_work_procedure::where('id',$id)->first();
        return view('dashboards.users.SafeWorkProcedure.index',compact('user','data','ppe','values'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'work_title' => 'required',
            'before_work' => 'required',
            'during_work' => 'required',
            'after_work' => 'required',
            'potential_hazard' => 'required',
            'ppe_name' => 'required',
            'remarks' => 'required',
        ]);
         $input = s_work_procedure::find($id);
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
        }else{
            unset( $input['before_work_image'] );
        }
        if ($during_work_image = $request->file('during_work_image')) {
            $destinationPath = 'image/SafetyWorkProcedure/duringWork';
            $duringImage = date('YmdHis') . "." . $during_work_image->getClientOriginalExtension();
            $during_work_image->move($destinationPath, $duringImage);
            $input['during_work_image'] = "$duringImage";
        }else{
            unset($input['during_work_image']);
        }
        if ($after_work_image = $request->file('after_work_image')) {
            $destinationPath = 'image/SafetyWorkProcedure/afterWork';
            $afterImage = date('YmdHis') . "." . $after_work_image->getClientOriginalExtension();
            $after_work_image->move($destinationPath, $afterImage);
            $input['after_work_image'] = "$afterImage";
        }else{
            unset( $input['after_work_image']);
        }
    
        if ($potential_hazard_image = $request->file('potential_hazard_image')) {
            $destinationPath = 'image/SafetyWorkProcedure/potentialHazard';
            $potentialImage = date('YmdHis') . "." . $potential_hazard_image->getClientOriginalExtension();
            $potential_hazard_image->move($destinationPath, $potentialImage);
            $input['potential_hazard_image'] = "$potentialImage";
        }else{
            unset($input['potential_hazard_image']);
        }
        $input->update();
        return back();
    }
    public function destroy(Request $request){
        $data=s_work_procedure::find($request->id);
        unlink('image/SafetyWorkProcedure/beforeWork/'.$data->before_work_image);
        unlink('image/SafetyWorkProcedure/duringWork/'.$data->during_work_image);
        unlink('image/SafetyWorkProcedure/afterWork/'.$data->after_work_image);
        unlink('image/SafetyWorkProcedure/potentialHazard/'.$data->potential_hazard_image);
        s_work_procedure::where('id',$data->id)->delete();
        return back();
       
    }

}
