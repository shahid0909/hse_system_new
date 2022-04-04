<?php

namespace App\Http\Controllers\user\AccidentInvesttigation;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use App\Models\Department;
use App\Models\Designation;
use App\Models\l_employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AccidentInvestController extends Controller
{
    public function accident(){

         $user = Auth::user();
         $dep = Department::all();
         $des = Designation::all();
        //  $em_data = l_employee::orderBy('id')->with('department')->with('designation')->get();
        //  $data['countries'] = l_country::get(["country","id"]);
         return view('dashboards.users.AccidentInvestigation.accidentAnalysis',compact('user','dep','des'));

     }

     public function getempName(Request $request, $id)
     {

         $em_name = l_employee::where('id',$id)->get();
        return response()->json($em_name);
     }
}
