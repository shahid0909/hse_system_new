<?php

namespace App\Http\Controllers\User\WorkInspection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkInspectionController extends Controller
{
     public function index()
    {

        $user = Auth::user();
        
        
        return view('dashboards.users.workplaceInspection.dashboard', compact('user'));

    }
}
