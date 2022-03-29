<?php

namespace App\Http\Controllers\User\WorkInspection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RectifiedInspectionController extends Controller
{
    //

      public function index()
    {

        $user = Auth::user();
        
        
        return view('dashboards.users.workplaceInspection.rectified_inspection', compact('user'));

    }
}
