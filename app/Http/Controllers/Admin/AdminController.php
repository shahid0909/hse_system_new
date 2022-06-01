<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ScheduleDemoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('dashboards.admins.index', compact('user'));
    }


    public function profile()
    {
        return view('dashboards.admins.profile');
    }


    public function settings()
    {
        return view('dashboards.admins.settings');
    }
}
