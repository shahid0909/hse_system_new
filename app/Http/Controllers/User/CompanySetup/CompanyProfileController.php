<?php


namespace App\Http\Controllers\User\CompanySetup;


use App\Http\Controllers\Controller;
use App\Models\l_country;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class CompanyProfileController extends Controller
{
    public function index(){

        $user = Auth::user();
        $country = l_country::all();
        return view('dashboards.users.companySetup.company_profile', compact('user','country'));

    }

    public function store(Request $request){
 
        $input =new CompanyProfile();
        $input->u_name = $request->input('u_name');
        $input->password = $request->input('password');
        $input->com_name= $request->input('com_name');
        $input->com_person= $request->input('com_person');
        $input->com_m_number= $request->input('com_m_number');
        $input->com_address= $request->input('com_address');
        $input->com_email= $request->input('com_email');
        $input->com_url= $request->input('com_url');
        $input->com_country= $request->input('com_country');
        $input->com_state= $request->input('com_state');
        $input->com_city= $request->input('com_city');
        $input->com_postal= $request->input('com_postal');
        $input -> save();
        return redirect()->route('dashboards.users.companySetup.company_profile');
    }





}
