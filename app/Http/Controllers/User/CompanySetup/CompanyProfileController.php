<?php


namespace App\Http\Controllers\User\CompanySetup;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class CompanyProfileController extends Controller
{
    public function index(){

        $user = Auth::user();
        return view('dashboards.users.companySetup.company_profile', compact('user'));

    }

    public function store(Request $request){
        dd($request);

    }





}
