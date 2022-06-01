<?php


namespace App\Http\Controllers\Admin\AdminA\Setup;


use App\Http\Controllers\Controller;
use App\Models\l_case;
use App\Models\l_ghslabel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class GhslabelController extends Controller
{
    public function index(){

        $data = l_ghslabel::orderby('id','desc')->get();
        $user = Auth::user();
        return view('dashboards.admins.setup.l_ghslabel.index', compact('user','data'));

    }

    public function store(Request $request){

        $request->validate([
            'ghsName' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();


        if ($image = $request->file('image')) {
            $destinationPath = 'image/ghs';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        l_ghslabel::create($input);


        return redirect()->back()->with(['success'=>'Form is successfully submitted!']);

    }


    public function edit (Request $request, $id){

        $user = Auth::user();
        $data = l_ghslabel::orderby('id','desc')->get();
        $datas = l_ghslabel::where('id', $id)->first();

        return view('dashboards.admins.setup.l_hazard.index', compact('data','datas','user'));


    }

    public function update(Request $request,$id){

        $ghslabel = l_ghslabel::find($id);

        $ghslabel->ghsName = $request->input('ghsName');
        if ($image = $request->file('image')) {
            $destinationPath = 'image/ghs';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $ghslabel['image'] = "$profileImage";
        }else{
            unset($ghslabel['image']);
        }
        $ghslabel->update();


        return redirect()->route('l_ghs_label.index')->with(['success'=>'Form is successfully submitted!']);
    }



    public function destroy(Request $request) {

        $data = l_ghslabel::find($request->id);

        unlink("image/ghs/".$data->image);

        l_ghslabel::where("id", $data->id)->delete();

        return redirect()->route('l_ghs_label.index')->with(['success'=>'Form is successfully Deleted!']);

    }


}
