<?php


namespace App\Http\Controllers\User\CompanySetup;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\l_employee;


class EmployeeController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        return view('dashboards.users.companySetup.l_employee', compact('user'));

    }

    public function store(Request $request)
    {
        $input = new l_employee();
        $input->em_name = $request->input('em_name');
        $input->em_designation = $request->input('em_designation');
        $input->em_department = $request->input('em_department');
        $input->em_ic_passport_no = $request->input('em_ic_passport_no');
        $input->em_country = $request->input('em_country');
        $input->em_j_date = $request->input('em_j_date');
        $input->em_mail = $request->input('em_mail');
        $input->em_phone = $request->input('em_phone');
        $input->em_name = $request->input('em_name');
        if($request->hasfile('em_profile'))
        {
            $file = $request->file('em_profile');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/l_employees/', $filename);
            $input->em_profile = $filename;
        }
        $input->save();
        return redirect()->back();
    }




}
