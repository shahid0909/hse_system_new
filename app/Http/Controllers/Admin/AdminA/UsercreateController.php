<?php


namespace App\Http\Controllers\Admin\AdminA;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsercreateController extends Controller
{

    public function index(){

        $user = Auth::user();
        return view('dashboards.admins.usercreate.index',compact('user'));
    }

    public function store(Request $request)
    {
//        dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'required',
        ]);

        $input =new User();
        $input->name = $request->input('name');
        $input->email = $request->input('email');
        $input->role = $request->input('role');
        $input->password = Hash::make($request->input('password'));
        $input->save();

        return redirect()->back()->with(['success'=>'Form is successfully submitted!']);

    }


}
