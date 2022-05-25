<?php
namespace App\Http\Controllers\User\safety;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\s_rule;
use App\Models\l_employee;
use App\Models\CompanyProfile;
use App\Models\designation;
use Carbon\Carbon;
use DateTime;
use Session;
use Auth;
use PDF;
use DB;

class SafetyPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function sfirst(Request $req){
        $user = Auth::user();
        $companies=CompanyProfile::all();
        $val=$req->company_name;
         return view('dashboards.admins.safety.sfirst',compact('user','companies','val'));
     }


    public function index(Request $request)
    {
        $user = Auth::user();
        $values=s_rule::orderby('id','desc')->get();
       $employees=l_employee::all();
       $companies=CompanyProfile::all();
       $companyname=$request->company_name;
       $val=$request->val;
    //    $em=$employees->em_name;
    //    $s_rule=DB::table('s_rules')
    //         ->leftJoin('l_employees', 'l_employees.id', '=', 's_rules.employee_id')
    //         ->where('jahid','=',$em)->first();
        return view('dashboards.admins.safety.index',compact('user','employees','val','companies','companyname'));
    }

    public function policyindex()
    {
        $user = Auth::user();
        $employees=l_employee::all();
        $companies=CompanyProfile::all();
        return view('dashboards.admins.safety.g_policy',compact('user','employees','companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $request->validate([
            'title'=>'required|string',
            'tagline'=>'required|string',
        ]);

        $input=new s_rule();
        $input->title=$request->input('title');
        $input->commitment=$request->input('commitment');
        $input->tagline=$request->input('tagline');
        $input->employee_id=$request->input('employee_id');
        $input->designation_id=$request->input('designation_id');
        $input->company_id=$request->input('company_id');
        $input->save();
        Session::flash('success', 'Safety Policy successfully. Generated.!!');
    
        // session()->flash('msg','Accident Investigation has been saved successfully !!');
         return redirect()->route('safety.policy-view');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user();
        $safetys=s_rule::OrderBy('id','desc')->get();
        return view('dashboards.admins.safety.s_view',compact('safetys','user'));
    }
    public function safetyview()
    {
        $user = Auth::user();
        $data=DB::table('safety_committees')
        ->leftJoin('l_employees', 'l_employees.id', '=', 'safety_committees.employee_id')
        ->first();
        $safetys=s_rule::with('employee','designation','company')->OrderBy('id','desc')->latest()->first();
        if(isset($safetys->created_at)){
            $created = new Carbon($safetys->created_at);
            $datetime1 = new DateTime($created);
            $newDateTime = $created->addYears(2);
            return view('dashboards.admins.safety.safety_view',compact('safetys','user','data','newDateTime'));
        }else{
            $newDateTime='';
            return view('dashboards.admins.safety.safety_view',compact('safetys','user','data','newDateTime'));
        }
  

        return view('dashboards.admins.safety.safety_view',compact('safetys','user','data','newDateTime'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function modify($id)
    {
        $user = Auth::user();
        $data =s_rule::where('id',$id)->first();
        return view('dashboards.admins.safety.s_view',compact('user','data'));
    }
    public function  modifystore(Request $request,$id){

        $input=s_rule::find($id);
        $input->title=$request->input('title');
        $input->commitment=$request->input('commitment');
        $input->tagline=$request->input('tagline');
        $input->update();
        return redirect()->route('safety.safety-view');
    }



    public function download($id){
        $data=s_rule::where('id',$id)->first();
        $pdf = PDF::loadView('dashboards.admins.safety.pdf',compact('data'));
         return $pdf->download('SafetyPolicyRules.pdf');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        s_rule::find($id)->delete();
        return back();
    }

public function  getempdesignation($id)
{

$designation=DB::selectOne("SELECT d.id, d.ds_name from designations d 
left join l_employees e on e.em_designation = d.id
where e.id =  '$id'");
return $designation;

}

    public function safetyTemplate(){
        $user = Auth::user();
        return view('dashboards.admins.safety.safetytemplate',compact('user'));
    }
}