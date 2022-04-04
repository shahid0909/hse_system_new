<?php

namespace App\Http\Controllers\Admin\AdminA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SafetyCommittee;
use App\Models\g_committe;
use Illuminate\Support\Facades\DB;
use Auth;
use PDF;


class generateCommittee extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $committes= SafetyCommittee::all();
        $user = Auth::user();
       $gc= g_committe::all();
        return view('dashboards.users.safetycommittee.committe',compact('user','committes','gc'));
    }

    public function employee(Request $request){


<<<<<<< HEAD
       $committes=DB::select("SELECT e.id,e.em_name FROM safety_committees s
          LEFT join l_employees e on e.id = s.employee_id
         WHERE  s.designation = '$request->designation'");
=======
       $committes= DB::select("SELECT e.id as id,e.em_name as em_name FROM safety_committees s
LEFT join l_employees e on e.id = s.employee_id
WHERE  s.designation = '$request->designation'");
>>>>>>> c5a401e328d0158cb012ae8624f624e7cd8b133f

       $stringTosend = '';
       if(!empty($committes)){
           $stringTosend .= ' <option value="">--- Choose ---</option>';
           foreach($committes as $committe){

            $stringTosend .="<option value='".$committe->id."'>".$committe->em_name."</option>";
        }
        echo   $stringTosend;
       }else{

        echo ' <option value="">--- Choose ---</option>';
       }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input= new g_committe();
        $input->designation_name=$request->input('designation_id');
        $input->employee_id=$request->input('employee_id');
        $input->company_name=$request->input('c_name');
        $input->save();
        return redirect( route('safety_committee.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     * public function  
     */

    public function generatepdf($id){
        $data=g_committe::where('id',$id)->first();
        $pdf = PDF::loadView('dashboards.users.safetycommittee.pdf',compact('data'));
         return $pdf->download('Committe.pdf');
    }
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
        g_committe::find($id)->delete();
        return back();
    }
}
