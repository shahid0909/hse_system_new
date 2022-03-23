<?php


namespace App\Http\Controllers\Admin\AdminA\Setup;


use App\Http\Controllers\Controller;

use App\Models\l_ppe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ppeController extends Controller
{

    public function index(){

        $user = Auth::user();
        $data = l_ppe::orderby('id','desc')->get();
        return view('dashboards.admins.setup.l_ppe.index',compact('user','data'));
    }

    public function store(Request $request){

        $request->validate([
            'ppeName' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();


        if ($image = $request->file('image')) {
            $destinationPath = 'image/ppe';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        l_ppe::create($input);


        return redirect()->back()->with(['success'=>'Form is successfully submitted!']);

    }


    public function edit (Request $request, $id){

        $user = Auth::user();
        $data = l_ppe::orderby('id','desc')->get();
        $datas = l_ppe::where('id', $id)->first();

        return view('dashboards.admins.setup.l_ppe.index', compact('data','datas','user'));


    }

    public function update(Request $request,$id){

        $ppe = l_ppe::find($id);

        $ppe->ppeName = $request->input('ppeName');
        if ($image = $request->file('image')) {
            $destinationPath = 'image/ppe';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $ppe['image'] = "$profileImage";
        }else{
            unset($ppe['image']);
        }
        $ppe->update();


        return redirect()->route('l_ppe.index')->with(['success'=>'Form is successfully submitted!']);
    }



    public function destroy(Request $request) {

        $data = l_ppe::find($request->id);

        unlink("image/ppe/".$data->image);

        l_ppe::where("id", $data->id)->delete();

        return redirect()->route('l_ppe.index')->with(['success'=>'Form is successfully Deleted!']);

    }

}
