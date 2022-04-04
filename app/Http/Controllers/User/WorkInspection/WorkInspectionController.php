<?php

namespace App\Http\Controllers\User\WorkInspection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WorkInspectionController extends Controller
{
     public function index()
    {

        $user = Auth::user();


        $urgent = DB::select("SELECT count(priority) urgent FROM create_inspections WHERE  priority = 1");


        return view('dashboards.users.workplaceInspection.dashboard', compact('user'));


    }
}
