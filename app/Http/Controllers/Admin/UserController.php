<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    public function index(){
        $user = Auth::user();
        return view('dashboards.users.index', compact('user'));
    }

    public function profile(){
        return view('dashboards.users.profile');
    }

    public function settings(){
        return view('dashboards.users.settings');
    }
}
