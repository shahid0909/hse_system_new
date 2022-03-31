<?php


namespace App\Http\Controllers\User\safety;


use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UploadPolicyController extends Controller
{

    public function index(){

        $user = Auth::user();

        return view('dashboards.admins.safety.uploadPolicy',compact('user'));

    }

    public function store(Request $request){

        dd($request);
    }

}
