<?php


namespace App\Http\Controllers\User\CompanySetup;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Designation;


class DesignationController extends Controller
{
    public function index(){
        $user = Auth::user();
        $designations=Designation::all();
        return view('dashboards.users.companySetup.l_designation', compact('designations','user'));
    }

    public function store(Request $request){
        
        $request->validate([
            'ds_name' => 'required',
            'ds_rank' => 'required',
            'ds_status' => 'required',
        ]);
        $input =new Designation();
        $input->ds_name = $request->input('ds_name');
        $input->ds_rank = $request->input('ds_rank');
        $input->ds_status= $request->input('ds_status');
        
//dd($input);
        $input->save();

        return back();
    }

    public function designationedit($id){
        $user = Auth::user();
        
         return view('dashboards.users.companySetup.e_designation',compact('user'));
    }

    public function  editstore(Request $request,$id){
        dd($id);
        $request->validate([
            'ds_name' => 'required',
            'ds_rank' => 'required',
            'ds_status' => 'required',
        ]);
        $input =new Designation();
        $input->ds_name = $request->input('ds_name');
        $input->ds_rank = $request->input('ds_rank');
        $input->ds_status= $request->input('ds_status');
        
//dd($input);
        $input->save();
        return redirct('dashboards.users.companySetup.l_designation');
    }

   
}
