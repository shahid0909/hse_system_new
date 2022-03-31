<?php


namespace App\Http\Controllers\User\safety;


use App\Http\Controllers\Controller;

use App\Models\uploadPolicy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\File;

class UploadPolicyController extends Controller
{

    public function index(){

        $user = Auth::user();


        return view('dashboards.admins.safety.uploadPolicy',compact('user'));

    }

    public function store(Request $request){


        $input = new uploadPolicy();

        $input->policy_name = $request->input('policyName');


        if ($policy_File = $request->file('policyFile')) {
            $destinationPath = 'policy/file';
            $file =$policy_File->getClientOriginalName();
            $policy_File->move($destinationPath, $file);
            $input['policy_File'] = "$file";
        }


        $input->insert_by = Auth::user()->id;

        $input->save();

        return redirect()->back()->with(['success'=>'File is successfully submitted!']);

    }
    public function datatable()
    {
        $data = uploadPolicy::orderBy('id', 'DESC')->get();

        return datatables()
            ->of($data)
//
            ->editColumn('view', function ($query) {
                $url=asset("policy/file/$query->policy_file");
                return '<a href="'.$url.'" target="_blank">'.$query->policy_file.'</a>';
//
            })
            ->editColumn('action', function ($query) {
                return '<a href="' . route('upload_policy.edit', $query['id']) . '" class=""><i class="icofont-edit"></i></a> || <a href="' . route('upload_policy.destroy', $query['id']) . '" class="" onclick="return confirm(\'Are You Sure You Want To Delete This File?\')"> <i class="icofont-delete-alt"></i></a>';
            })
            ->escapeColumns('view')
            ->addIndexColumn()
            ->make();
    }


public function edit(Request $request, $id){

    $user = Auth::user();
    $data = uploadPolicy::where('id',$id)->first();

    return view('dashboards.admins.safety.uploadPolicy',compact('user','data'));

}

    public function update(Request $request, $id)
    {


        $input = uploadPolicy::find($id);
        $input->policy_name = $request->input('policyName');


        if ($policy_File = $request->file('policyFile')) {
            $destinationPath = 'policy/file';
            $file = $policy_File->getClientOriginalName();
            $policy_File->move($destinationPath, $file);
            $input['policy_File'] = "$file";


        }else{
            unset( $input['policy_File']);

        }

        $input->insert_by = Auth::user()->id;
        $input->update();


        return redirect()->route('upload_policy.index')->with(['success' => 'Policy is successfully Updated!']);

    }

    public function destroy($id)

    {

        $policy = uploadPolicy::findOrFail($id);

        if ($policy) {
            if (file_exists('policy/file/' . $policy->policy_file) and !empty($policy->policy_file)) {
                unlink('policy/file/' . $policy->policy_file);
            }
            $policy->delete();
            return redirect()->back()->with('success', 'Policy information successfully deleted.');
        }

    }


}
