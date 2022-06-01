<?php

namespace App\Http\Controllers\User\WorkInspection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\create_inspection;
use App\Models\RectifiedInspection;

use Illuminate\Support\Facades\DB;

class WorkInspectionController extends Controller
{
     public function index()
    {

        $user = Auth::user();


        $priority = DB::select("SELECT count(priority) as urgent FROM `create_inspections` WHERE  priority = 0");

        $priority1 = DB::select("SELECT count(priority) as days FROM create_inspections WHERE  priority = 1");

        $priority2 = DB::select("SELECT count(priority) as more_week FROM `create_inspections` WHERE  priority = 2");



         $count = DB::table('create_inspections')->count();
         $count1 = DB::table('rectified_inspections')->count();
         $count2=$count-$count1;
        

          
        
        
        return view('dashboards.users.workplaceInspection.dashboard', compact('user','count','priority','priority1','priority2','count1','count2'));

  

    }
}
