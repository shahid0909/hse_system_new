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


class HirarcController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $department = Department::all();
        $Designation = Designation::all();
        $l_employee = l_employee::all();

        $data = DB::table('i_hirarcs')
               ->join('departments','i_hirarcs.depertment_id','departments.id')

               ->select('i_hirarcs.*','departments.depertment_name')->get();

          $data1 = DB::table('i_hirarcs')
               ->join('designations','i_hirarcs.designation_id','designations.id')

               ->select('i_hirarcs.*','designations.ds_name')->get();      
       
        $data2 = DB::table('i_hirarcs')
               ->join('l_employees','i_hirarcs.employee_id','l_employees.id')

               ->select('i_hirarcs.*','l_employees.em_name')->get(); 

        return view('dashboards.users.HIRARC.hirarc', compact('user','l_employee','Designation','department','data','data1','data2'));
    }

    
   public function store(Request $request)

    {
      
        
       

        $input = new I_hirarc();
        $input->depertment_id = $request->input('depertment_id');
        $input->job_activity = $request->input('job_activity');
        $input->process = $request->input('process');
        $input->location = $request->input('location');
        $input->rm_assessor = $request->input('rm_assessor');
        $input->rm_member1 = $request->input('rm_member1');
        $input->rm_member2 = $request->input('rm_member2');
        $input->rm_member3 = $request->input('rm_member3');
       $input->rm_member4 = $request->input('rm_member4');
        $input->last_assessment = $request->input('last_assessment');
        $input->assessment_date = $request->input('assessment_date');
      
        $input->designation_id = $request->input('designation_id');
        $input->employee_id = $request->input('employee_id');
        $input->date = $request->input('date');
        $input->reference_no = $request->input('reference_no');
           if ($Signature = $request->file('Signature')) {
            $destinationPath = 'image/hirarc';
            $profileImage = date('YmdHis') . "." . $Signature->getClientOriginalExtension();
            $Signature->move($destinationPath, $profileImage);
            $input['Signature'] = "$profileImage";
        }

         $input->save();
        

         $count = $request->sequence_job;

       foreach($count as $main=>$row)
         {
            $input1 = new hazard();
          $input1->hirarc_id = $input->id;   
        
        $input1->sequence_job = $request->sequence_job[$main];
        $input1->hazard = $request->hazard[$main];
        $input1->c_hazard = $request->c_hazard[$main];
        $input1->event_consequences = $request->event_consequences[$main];
        $input1->risk_control = $request->risk_control[$main];
        $input1->j_likelihood = $request->j_likelihood[$main];
        $input1->likelihood_l = $request->likelihood_l[$main];
        $input1->severity_s = $request->severity_s[$main];
        $input1->rmn = $request->rmn[$main];
        $input1->additional_risk = $request->additional_risk[$main];
        $input1->likelihood_l1 = $request->likelihood_l1[$main];
        $input1->severity_S1 = $request->severity_S1[$main];
        $input1->remarks = $request->remarks[$main];
        $input1->pic_date = $request->pic_date[$main];

        $input1->rmn1 = $request->rmn1[$main];
      
       
        $input1->save();
    }

       session()->flash('message','Accident Investigation has been saved successfully !!');
         return redirect()->back();



      

     

        

    }

    public function listview()
    {
    

            $user = Auth::user();
        

                $data = DB::select("SELECT a.*,d.depertment_name,e.em_name as rm, e1.em_name as rm1,e2.em_name as rm2, e3.em_name as rm3, e4.em_name as rm4,emp.em_name as employee_name,de.ds_name from i_hirarcs a
                            left join departments d on d.id = a.depertment_id
                            left JOIN l_employees e on e.id =a.rm_assessor
                            left JOIN l_employees e1 on a.rm_member1 = e1.id
                            left JOIN l_employees e2 on a.rm_member2 = e2.id
                            left JOIN l_employees e3 on a.rm_member3 = e3.id
                            left JOIN l_employees e4 on a.rm_member4 = e4.id
                            left JOIN l_employees emp on a.employee_id = emp.id
                            LEFT JOIN designations de on de.id =a.designation_id");
              
             return view('dashboards.users.HIRARC.hirarc_list',compact('user','data'));

    }


//     public function datatable()
//     {
            
// $data = DB::select("SELECT  a.id as id,a.process,a.location,a.last_assessment,a.assessment_date,a.Signature,a.date,a.employee_id,a.depertment_id,a.employee_id
// ,a.designation_id,a.Reference_no,

// b.job_activity,b.sequence_job,b.hazard,b.c_hazard,b.event_consequences,b.risk_control,
// b.rmn,b.j_likelihood,b.additional_risk,b.rmn1,b.remarks,b.pic_date,a.rm_assessor,a.rm_member1,a.rm_member2,a.rm_member3,a.rm_member4,

// d.depertment_name,e.em_name,de.ds_name FROM i_hirarcs A 
// LEFT join hazards B on B.hirarc_id = A.id
// left join departments d on d.id = a.depertment_id
// left join l_employees e on e.id =a.employee_id
// LEFT JOIN designations de on de.id =a.designation_id");
     
//         // $data = I_hirarc::with('job_a')->orderby('id', 'DESC')->get();
         
//   // dd($data[0]->id);

//         return datatables()
//             ->of($data)
           
//             // // ?->addIndexColumn()
//             // // ->addColumn('image', function ($query) {
//             // //     $url=asset("image/hirarc/$query->image");
//             // //     return '<img src='.$url.' border="0" width="40"  class="img-rounded" align="center" />';
//             // // })
//             ->editColumn('action', function ($query) {
//                 return '<a href="' . route('hirarc.edit', $query['id']) . '" class="">
//                 <i class="icofont-edit"></i>
//                 </a> 

//                 // ||<a href="' . route('hirarc.view', $query['id']) . '" class="">
//                 // <i class="icofont-edit"></i>
//                 // </a> 

               

//                 || <a href="' . route('hirarc.destroy', $query['id']) . '" class="" onclick="return confirm(\'Are You Sure You Want To Delete This department?\')"> <i class="icofont-delete-alt"></i></a>';
//             })
//             // ->escapeColumns('image')
//             ->make();
            
//     }

    public function view($id)
    {

            $user = Auth::user();
            $department = Department::all();
            $Designation = Designation::all(); 
            $l_employee = l_employee::all();
            // $data = I_hirarc::orderBy('id', 'DESC')->get();

             

            $data1 =DB::table('i_hirarcs')
            ->join('departments','i_hirarcs.depertment_id', '=','departments.id')
            ->join('l_employees as em1','i_hirarcs.employee_id', '=','em1.id')
            ->join('l_employees as em2','i_hirarcs.rm_assessor', '=','em2.id')
            ->join('l_employees as em3','i_hirarcs.rm_member1', '=','em3.id')
            ->join('l_employees as em4','i_hirarcs.rm_member2', '=','em4.id')
            ->join('l_employees as em5','i_hirarcs.rm_member3', '=','em5.id')
            ->join('l_employees as em6','i_hirarcs.rm_member4', '=','em6.id')
            



            ->select('departments.depertment_name','em1.em_name as m1','em2.em_name as m2','em3.em_name as m3','em4.em_name as m4','em5.em_name as m5','em6.em_name as m6','i_hirarcs.process','i_hirarcs.location','i_hirarcs.job_activity','i_hirarcs.rm_assessor','i_hirarcs.rm_member2','i_hirarcs.Reference_no','i_hirarcs.date','i_hirarcs.assessment_date','i_hirarcs.id')
            ->where([
                ['i_hirarcs.id','=',$id],
            ])->first();
            // dd($data1);

           //   $data =DB::table('i_hirarcs')
           //  ->join('departments','i_hirarcs.depertment_id', '=','departments.id')
           // ->join('hazards as har1','i_hirarcs.id','=','har1.hirarc_id')
           
            



           //  ->select('departments.depertment_name','','i_hirarcs.id')
           //  ->where([
           //      ['i_hirarcs.id','=',$id],
           //  ])->get();

                        $data=DB::select("SELECT h.* from hazards h
                        join i_hirarcs i on i.id = h.hirarc_id
                         where i.id = '$id' ");

            

              return view('dashboards.users.HIRARC.view_hirarc', compact('user','l_employee','Designation','department','data','data1'));

     }

 public function destroy($id)

    {


            DB::table("i_hirarcs")->where("id",$id)->delete();
            DB::table("hazards")->where("hirarc_id",$id)->delete();
            return redirect()->back()->with('success', 'Hirarc information successfully deleted.');

    }



public function edit($id)
    {
        $user = Auth::user();
         $department = Department::all();
        $Designation = Designation::all();
        $l_employee = l_employee::all();
        $data = I_hirarc::where('id', $id)->first();
               
         $data1=DB::select("SELECT h.* from hazards h
                        join i_hirarcs i on i.id = h.hirarc_id
                         where i.id = '$id' ");
         // dd($data);
  

          return view('dashboards.users.HIRARC.edit', compact('user','l_employee','Designation','department','data','data1'));
    }



    public function update(Request $request, $id)
    {
        
      

       $input = I_hirarc::find($id);
        $input->depertment_id = $request->input('depertment_id');
         $input->job_activity = $request->input('job_activity');
        $input->process = $request->input('process');
        $input->location = $request->input('location');
        $input->rm_assessor = $request->input('rm_assessor');
        $input->rm_member1 = $request->input('rm_member1');
        $input->rm_member2 = $request->input('rm_member2');
        $input->rm_member3 = $request->input('rm_member3');
       $input->rm_member4 = $request->input('rm_member4');
        $input->last_assessment = $request->input('last_assessment');
        $input->assessment_date = $request->input('assessment_date');
      
        $input->designation_id = $request->input('designation_id');
        $input->employee_id = $request->input('employee_id');
        $input->date = $request->input('date');
        $input->reference_no = $request->input('reference_no');
           if ($Signature = $request->file('Signature')) {
            $destinationPath = 'image/hirarc';
            $profileImage = date('YmdHis') . "." . $Signature->getClientOriginalExtension();
            $Signature->move($destinationPath, $profileImage);
            $input['Signature'] = "$profileImage";
        }

         $input->update();
        

         $count = $request->sequence_job;
              // dd($count);

       foreach($count as $main=>$row)
         {
   
            $input1 = hazard::where('hirarc_id',$id)->first();
          // $input1->hirarc_id = $input->id;   
             $input1->hirarc_id = $request->hirarc_id;
        
         $input1->sequence_job = $request->sequence_job[$main];
        $input1->hazard = $request->hazard[$main];
        $input1->c_hazard = $request->c_hazard[$main];
        $input1->event_consequences = $request->event_consequences[$main];
        $input1->risk_control = $request->risk_control[$main];
        $input1->j_likelihood = $request->j_likelihood[$main];
        $input1->likelihood_l = $request->likelihood_l[$main];
        $input1->severity_s = $request->severity_s[$main];
        $input1->rmn = $request->rmn[$main];
        $input1->additional_risk = $request->additional_risk[$main];
        $input1->likelihood_l1 = $request->likelihood_l1[$main];
        $input1->severity_S1 = $request->severity_S1[$main];
        $input1->remarks = $request->remarks[$main];
        $input1->pic_date = $request->pic_date[$main];

        $input1->rmn1 = $request->rmn1[$main];


      
       
        $input1->update();
    }


       session()->flash('message','Accident Investigation has been saved successfully !!');
         return redirect()->back();

        

    }

//     public function employee(Request $request){



//        $committes=DB::select("SELECT e.id,e.em_name FROM safety_committees s
//           LEFT join l_employees e on e.id = s.employee_id
//          WHERE  s.designation = '$request->designation'");

//        $committes= DB::select("SELECT e.id as id,e.em_name as em_name FROM safety_committees s
// LEFT join l_employees e on e.id = s.employee_id
// WHERE  s.designation = '$request->designation'");


//        $stringTosend = '';
//        if(!empty($committes))
//        {
//            $stringTosend .= ' <option value="">--- Choose ---</option>';
//            foreach($committes as $committe){

//             $stringTosend .="<option value='".$committe->id."'>".$committe->em_name."</option>";
//         }
//         echo   $stringTosend;
//        }
//        else{

//         echo ' <option value="">--- Choose ---</option>';
//        }


//     }


    public function  getempdesignation($id)
   {
    

$designation=DB::selectOne("SELECT d.id, d.ds_name from designations d 
left join l_employees e on e.em_designation = d.id
where e.id =  '$id'");
return $designation;

    }


}
