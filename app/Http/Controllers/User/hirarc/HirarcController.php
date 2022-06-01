<?php

namespace App\Http\Controllers\User\hirarc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\I_hirarc;
use App\Models\hazard;
use App\Models\c_job;
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
            ->join('departments', 'i_hirarcs.depertment_id', 'departments.id')
            ->select('i_hirarcs.*', 'departments.depertment_name')->get();

        $data1 = DB::table('i_hirarcs')
            ->join('designations', 'i_hirarcs.designation_id', 'designations.id')
            ->select('i_hirarcs.*', 'designations.ds_name')->get();


        $data2 = DB::table('i_hirarcs')
            ->join('l_employees', 'i_hirarcs.employee_id', 'l_employees.id')
            ->select('i_hirarcs.*', 'l_employees.em_name')->get();

        return view('dashboards.users.HIRARC.hirarc', compact('user', 'l_employee', 'Designation', 'department', 'data', 'data1', 'data2'));
    }


    public function store(Request $request)

    {

//      dd($request);
        $user = Auth::user();

        $input = new I_hirarc();
        $input->depertment_id = $request->input('depertment_id');
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
//           if ($Signature = $request->file('Signature'))
//            {
//            $destinationPath = 'image/hirarc';
//            $profileImage = date('YmdHis') . "." . $Signature->getClientOriginalExtension();
//            $Signature->move($destinationPath, $profileImage);
//            $input['Signature'] = "$profileImage";
//            }
        $input->company_id = $user->company_id;
        $input->save();

        $count = $request->job_activity;


        foreach ($count as $main => $row) {

            $user = Auth::user();
            $input1 = new c_job();
            $input1->hirarc_id = $input->id;
            $input1->company_id = $user->company_id;

            if ($imagefile = $request->file('imagefile')[$main]) {
                $destinationPath = 'image/jobimage';
                $profileImage = date('YmdHis') . "." . $imagefile->getClientOriginalExtension();
                $imagefile->move($destinationPath, $profileImage);


                $input1['image'] = "$profileImage";
            }


            $input1->job_activity = $request->job_activity[$main];


            $input1->save();


        }
        session()->flash('message', 'Accident Investigation has been saved successfully !!');
        return redirect()->back();


    }


    public function getempdesignation($id)
    {

        $designation = DB::selectOne("SELECT d.id, d.ds_name from designations d
            left join l_employees e on e.em_designation = d.id
            where e.id =  '$id'");
        return $designation;

    }


    public function listview()
    {


        $user = Auth::user();


        $data1 = DB::select("SELECT a.*,d.depertment_name,c.job_activity from hazards a
                            left join departments d on d.id = a.depertment_id
                            left JOIN c_jobs c on c.id =a.job_activity_id");


        // dd($data1);

        $data = DB::select("SELECT a.*,d.depertment_name,e.em_name as rm, e1.em_name as rm1,e2.em_name as rm2, e3.em_name as rm3, e4.em_name as rm4,emp.em_name as employee_name,de.ds_name from i_hirarcs a
                            left join departments d on d.id = a.depertment_id
                            left JOIN l_employees e on e.id =a.rm_assessor
                            left JOIN l_employees e1 on a.rm_member1 = e1.id
                            left JOIN l_employees e2 on a.rm_member2 = e2.id
                            left JOIN l_employees e3 on a.rm_member3 = e3.id
                            left JOIN l_employees e4 on a.rm_member4 = e4.id
                            left JOIN l_employees emp on a.employee_id = emp.id
                            LEFT JOIN designations de on de.id =a.designation_id");


        return view('dashboards.users.HIRARC.hirarc_list', compact('user', 'data', 'data1'));

    }


    public function view($id)
    {

        $user = Auth::user();
        $department = Department::all();
        $Designation = Designation::all();
        $l_employee = l_employee::all();


        $data1 = DB::table('i_hirarcs')
            ->join('departments', 'i_hirarcs.depertment_id', '=', 'departments.id')
            ->join('l_employees as em1', 'i_hirarcs.employee_id', '=', 'em1.id')
            ->join('l_employees as em2', 'i_hirarcs.rm_assessor', '=', 'em2.id')
            ->join('l_employees as em3', 'i_hirarcs.rm_member1', '=', 'em3.id')
            ->join('l_employees as em4', 'i_hirarcs.rm_member2', '=', 'em4.id')
            ->join('l_employees as em5', 'i_hirarcs.rm_member3', '=', 'em5.id')
            ->join('l_employees as em6', 'i_hirarcs.rm_member4', '=', 'em6.id')
            ->select('departments.depertment_name', 'em1.em_name as m1', 'em2.em_name as m2', 'em3.em_name as m3', 'em4.em_name as m4', 'em5.em_name as m5', 'em6.em_name as m6', 'i_hirarcs.process', 'i_hirarcs.location', 'i_hirarcs.rm_assessor', 'i_hirarcs.rm_member2', 'i_hirarcs.Reference_no', 'i_hirarcs.date', 'i_hirarcs.assessment_date', 'i_hirarcs.id')
            ->where([
                ['i_hirarcs.id', '=', $id],
            ])->first();


        $data2 = c_job::where('hirarc_id', $id)->first();


        $data = DB::select("SELECT c.*, hz.* FROM c_jobs c, hazards hz WHERE c.id = hz.job_activity_id
                                   and c.hirarc_id = '$id'");


        return view('dashboards.users.HIRARC.view_hirarc', compact('user', 'l_employee', 'Designation', 'department', 'data1', 'data2', 'data'));

    }


    public function destroy($id)

    {


        DB::table("i_hirarcs")->where("id", $id)->delete();
        DB::table("c_jobs")->where("hirarc_id", $id)->delete();

        return redirect()->back()->with('success', 'Hirarc information successfully deleted.');

    }


    public function edit($id)
    {
        $user = Auth::user();
        $department = Department::all();
        $Designation = Designation::all();
        $l_employee = l_employee::all();
        $data = I_hirarc::where('id', $id)->first();
        // dd($data);
        $data1 = DB::select("SELECT h.* from c_jobs h
                        join i_hirarcs i on i.id = h.hirarc_id
                         where i.id = '$id' ");
        // dd($data1);
        // dd($data);
        //  $data3 = DB::select('select e.*,dep.depertment_name from l_employees e
        // LEFT join departments dep on (dep.id = e.em_department) ORDER by e.id DESC;');


        $data3 = DB::table('i_hirarcs')
            ->join('departments', 'i_hirarcs.depertment_id', 'departments.id')
            ->select('i_hirarcs.*', 'departments.depertment_name')->get();


        return view('dashboards.users.HIRARC.edit', compact('user', 'l_employee', 'Designation', 'department', 'data', 'data1', 'data3'));
    }


    public function update(Request $request, $id)
    {


        $input = I_hirarc::find($id);
        $input->depertment_id = $request->input('depertment_id');
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

        $input->update();


        $count = $request->job_activity;
        // dd($count);

        foreach ($count as $main => $row) {

            $input1 = c_job::where('hirarc_id', $id)->first();
            // $input1->hirarc_id = $input->id;
            $input1->hirarc_id = $request->hirarc_id;

            $input1->job_activity = $request->job_activity[$main];


            $input1->update();
        }


        session()->flash('message', 'Accident Investigation has been saved successfully !!');
        return redirect()->back();


    }
}




