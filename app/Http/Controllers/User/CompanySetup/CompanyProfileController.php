<?php


namespace App\Http\Controllers\User\CompanySetup;


use App\Http\Controllers\Controller;
use App\Models\l_country;
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
        dd($request);

    }





}
