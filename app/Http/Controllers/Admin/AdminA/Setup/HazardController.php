<?php


namespace App\Http\Controllers\Admin\AdminA\Setup;


use App\Http\Controllers\Controller;
use App\Models\l_hazard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class HazardController extends Controller
{
    public function index(){

        $data = l_hazard::orderby('id','desc')->get();
        $user = Auth::user();
        return view('dashboards.admins.setup.l_hazard.index', compact('user','data'));

    }

    public function store(Request $request){

        $request->validate([
            'hazardName' => 'required',
            'hazardType' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/hazard';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        l_hazard::create($input);


        return redirect()->back()->with(['success'=>'Form is successfully submitted!']);

    }


    public function edit (Request $request, $id){

        $user = Auth::user();
        $data = l_hazard::orderby('id','desc')->get();
        $datas = l_hazard::where('id', $id)->first();

        return view('dashboards.admins.setup.l_hazard.index', compact('data','datas','user'));


    }

    public function update(Request $request,$id){

        $hazard = l_hazard::find($id);

        $hazard->hazardName = $request->input('hazardName');
        $hazard->hazardType = $request->input('hazardType');
        if ($image = $request->file('image')) {
            $destinationPath = 'image/hazard';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $hazard['image'] = "$profileImage";
        }else{
            unset($hazard['image']);
        }

        $hazard->update();


        return redirect()->route('l_hazard.index')->with(['success'=>'Form is successfully Updated!']);
    }

    public function destroy(Request $request) {

        $data = l_hazard::find($request->id);

        unlink("image/hazard/".$data->image);

        l_hazard::where("id", $data->id)->delete();

        return redirect()->route('l_hazard.index')->with(['success'=>'Form is successfully Deleted!']);

    }



}
