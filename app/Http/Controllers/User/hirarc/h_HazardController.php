<?php

namespace App\Http\Controllers\User\hirarc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\I_hirarc;
use App\Models\hazard;
use App\Models\Designation;
use App\Models\l_employee;
use App\Models\Department;
use App\Models\c_job;


class h_HazardController extends Controller
{
     public function index()
    {



        $user = Auth::user();
        $department = Department::all();
        $Designation = Designation::all();
        $l_employee = l_employee::all();
        $c_job=c_job::all();

          $data = DB::table('i_hirarcs')
               ->join('departments','i_hirarcs.depertment_id','departments.id')

               ->select('i_hirarcs.*','departments.depertment_name')->get();

          $data1 = DB::table('hazards')
               ->join('c_jobs','hazards.job_activity_id','c_jobs.id')

               ->select('hazards.*','c_jobs.job_activity')->get();


        return view('dashboards.users.HIRARC.hazard', compact('user','l_employee','Designation','department','data','data1','c_job'));
    }




    public function store(Request $request)

    {

         $user = Auth::user();

         $count = $request->sequence_job;

         foreach($count as $main=>$row)
         {


        $input = new hazard();
        $input->depertment_id = $request->input('depertment_id');
        $input->job_activity_id = $request->input('job_activity_id');
        $input->sequence_job = $request->sequence_job[$main];
        $input->hazard = $request->hazard[$main];
        $input->c_hazard = $request->c_hazard[$main];
        $input->event_consequences = $request->event_consequences[$main];
        $input->risk_control = $request->risk_control[$main];
        $input->j_likelihood = $request->j_likelihood[$main];
        $input->likelihood_l = $request->likelihood_l[$main];
        $input->severity_s = $request->severity_s[$main];
        $input->rmn = $request->rmn[$main];
        $input->additional_risk = $request->additional_risk[$main];
        $input->company_id =$user->company_id;

        $input->save();


       }
       return redirect()->back()->with('message', 'Data successfully Added.');






}
 public function destroy($id)

    {

        $hazard = hazard::findOrFail($id);

       if ($hazard)
         {
            $hazard->delete();
            return redirect()->back()->with('success', 'Department information successfully deleted.');
        }

    }



public function edit($id)
    {
         $user = Auth::user();
         $c_job = c_job::all();
         $department=department::all();
         $data1=hazard::all();
         $data = hazard::where('id', $id)->first();

           $data3 = DB::table('hazards')
               ->join('c_jobs','hazards.job_activity_id','c_jobs.id')

               ->select('hazards.*','c_jobs.job_activity')->where('hazards.id',$id)->first();





          return view('dashboards.users.HIRARC.edit_hazard', compact('user','c_job','department','data','data1','data3'));
    }


    public function update(Request $request, $id)
    {


      // dd($request);
        $input = hazard::find($id);
        $count = $request->sequence_job;


         foreach($count as $main=>$row)
         {

        $input->depertment_id = $request->input('depertment_id');
        $input->job_activity_id = $request->input('job_activity_id');
        $input->sequence_job = $request->sequence_job[$main];
        $input->hazard = $request->hazard[$main];
        $input->c_hazard = $request->c_hazard[$main];
        $input->event_consequences = $request->event_consequences[$main];
        $input->risk_control = $request->risk_control[$main];
        $input->j_likelihood = $request->j_likelihood[$main];
        $input->likelihood_l = $request->likelihood_l[$main];
        $input->severity_s = $request->severity_s[$main];
        $input->rmn = $request->rmn[$main];
        $input->additional_risk = $request->additional_risk[$main];


       }

         $input->update();

         session()->flash('message','Accident Investigation has been saved successfully !!');
         return redirect()->back();

    }




public function depertmentonchange(Request $request,$id)
{


//        $onchange = I_hirarc::where('depertment_id',$id)->first();
//
//        $onchage1 = c_job::where('hirarc_id',$onchange->id)->get();

    $onchage1 = DB::select("SELECT  c.id,c.job_activity from i_hirarcs h
LEFT join c_jobs c on c.hirarc_id = h.id
where h.depertment_id = '$id'");


        $stringTosend = '';
        if (!empty($onchage1))
        {
               $stringTosend .= ' <option value="">--- Choose ---</option>';
               foreach ($onchage1 as $data)
               {
                   $stringTosend .="<option  value='".$data->id."'>".$data->job_activity."</option>";


               }
                echo   $stringTosend;
        }else{
             echo ' <option value="">--- Choose ---</option>';
        }



}
}





















