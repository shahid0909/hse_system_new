<?php


namespace App\Http\Controllers\User\CompanySetup;


use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Designation;
use App\Models\l_country;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\l_employee;


class EmployeeController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $dep = Department::all();
        $des = Designation::all();
        $country = l_country::all();
        return view('dashboards.users.companySetup.l_employee', compact('user','dep','des','country'));

    }

    public function store(Request $request)
    {

        $input = new l_employee();
        $input->em_name = $request->input('em_name');
        $input->em_designation = $request->input('emp_des');
        $input->em_department = $request->input('em_department');
        $input->em_ic_passport_no = $request->input('em_ic_passport_no');
        $input->em_country = $request->input('country');
        $input->em_j_date = $request->input('em_j_date');
        $input->em_mail = $request->input('em_mail');
        $input->em_phone = $request->input('em_phone');
        $input->em_name = $request->input('em_name');
        $input->em_status = 'Y';
        if($request->hasfile('em_photo'))
        {
            $file = $request->file('em_photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/l_employees/', $filename);
            $input->em_profile = $filename;
        }

        $input->save();

        return redirect()->route('employee.index')->with(['success'=>'Form is successfully Updated!']);
    }




}
