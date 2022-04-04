<?php

namespace App\Http\Controllers\Admin\AdminA;

use App\Http\Controllers\Controller;
use App\Models\l_employee;
use App\Models\SafetyCommittee;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SafetyCommitteeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $employees = l_employee::all();
//        $safetyCommittee = DB::table('safety_committees as sc')
//            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
//            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no')->get();
        $chairman = DB::table('safety_committees as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no')
            ->where('sc.designation', '=', 'Chairman')
            ->get();
        $secretary = DB::table('safety_committees as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no')
            ->where('sc.designation', '=', 'Secretary')
            ->get();
        $employee_representative = DB::table('safety_committees as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no')
            ->where('sc.designation', '=', 'EMPLOYEE REPRESENTATIVE')
            ->get();
        $management_representative = DB::table('safety_committees as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no')
            ->where('sc.designation', '=', 'MANAGEMENT/EMPLOYER REPRESENTATIVE')
            ->get();
        $id = '';
        return view('dashboards.users.safetycommittee.index', compact('user', 'employees', 'id', 'secretary', 'employee_representative', 'management_representative', 'chairman'));
    }

    public function getData()
    {
        $chairman = DB::table('safety_committees as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no')
            ->where('sc.designation', '=', 'Chairman')
            ->get();
        $secretary = DB::table('safety_committees as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no')
            ->where('sc.designation', '=', 'Secretary')
            ->get();
        $employee_representative = DB::table('safety_committees as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no')
            ->where('sc.designation', '=', 'EMPLOYEE REPRESENTATIVE')
            ->get();
        $management_representative = DB::table('safety_committees as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no')
            ->where('sc.designation', '=', 'MANAGEMENT/EMPLOYER REPRESENTATIVE')
            ->get();
        return response()->json([
            'secretary'=>$secretary,
            'chairman'=>$chairman,
            'employee_representative'=>$employee_representative,
            'management_representative'=>$management_representative,
        ], 200);
    }
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'designation' => 'required',
            'photo' => 'required',
        ]);
        $input =new SafetyCommittee();
        $input->employee_id = $request->input('employee_id');
        $input->designation = $request->input('designation');
        if($request->hasfile('photo'))
        {
            $file = $request->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/safetyCommittee/', $filename);
            $input->photo = $filename;
        }else{
            set($input->photo);
        }
        $input->save();


        return json_encode($input, 200);
    }
    public function edit(Request $request, $id)
    {
        $id - $request->id;
        $safety_committee = SafetyCommittee::find($id);
        return response()->json(['safety_committee'=>$safety_committee]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'employee_id' => 'required',
            'designation' => 'required',

        ]);
        $update = SafetyCommittee::find($id);
        $currentPhoto = $update->photo;
        $update->employee_id = $request->input('employee_id');
        $update->designation = $request->input('designation');
        if($request->hasfile('photo') && request('photo') !== '')
        {
            $file = $request->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            if ($file !== $currentPhoto) {
                $oldPhoto = public_path('uploads/safetyCommittee/').$currentPhoto;
                if(file_exists($oldPhoto)){
                    unlink($oldPhoto); // then delete previous photo
                }
            }
            $file->move('uploads/safetyCommittee/', $filename);
            $update->photo = $filename;
        }else{
            unset($update->photo);
        }
        $update->update();


        return json_encode($update, 200);
    }
    public function committeedetails(){
        
    }
}
