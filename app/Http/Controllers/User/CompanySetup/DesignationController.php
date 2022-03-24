<?php


namespace App\Http\Controllers\User\CompanySetup;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Designation;


class DesignationController extends Controller
{
    public function index(){
        $user = Auth::user();
        $designations=Designation::all();
        return view('dashboards.users.companySetup.l_designation', compact('designations','user'));
    }

    public function store(Request $request){

        $request->validate([
            'ds_name' => 'required',
            'ds_rank' => 'required',
            'ds_status' => 'required',
        ]);
        $input =new Designation();
        $input->ds_name = $request->input('ds_name');
        $input->ds_rank = $request->input('ds_rank');
        $input->ds_status= $request->input('ds_status');

//dd($input);
        $input->save();

        return redirect()->route('designation.index')->with(['success'=>'Form is successfully submitted!']);
    }

    public function designationedit($id){

        $user = Auth::user();
        $designations =Designation::all();
        $data = Designation::where('id',$id)->first();

         return view('dashboards.users.companySetup.l_designation',compact('user','designations','data'));
    }

    public function  editstore(Request $request,$id){

        $request->validate([
            'ds_name' => 'required',
            'ds_rank' => 'required',
            'ds_status' => 'required',
        ]);
//        $input =new Designation();
//        $input->ds_name = $request->input('ds_name');
//        $input->ds_rank = $request->input('ds_rank');
//        $input->ds_status= $request->input('ds_status');
//
////dd($input);
//        $input->save();
//
//

        $input = Designation::find($id);

        $input->ds_name = $request->input('ds_name');
        $input->ds_rank = $request->input('ds_rank');
        $input->ds_status= $request->input('ds_status');
        $input -> update();

        return redirect()->route('designation.index')->with(['success'=>'Form is successfully Updated!']);

//        return redirct('dashboards.users.companySetup.l_designation');
    }


    public function datatable()
    {
        $data = Designation::orderBy('id','DESC')->get();

        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->addColumn('status', function ($query) {
                if($query->ds_status == '1'){
                    return 'Active';
                }else{
                    return 'In-Active';
                }

            })
            ->editColumn('action',function ($query) {
                return  '<a href="' . route('designation.designation-edit', $query['id']) . '" class=""><i class="icofont-edit"></i></a> || <a href="' . route('designation.destroy', $query['id']) . '" class="btn btn-danger" onclick="return confirm(\'Are You Sure You Want To Delete This Designation?\')"> <i class="icofont-delete-alt"></i></a>';
            }
            )->make();
    }

    public function destroy(Request $request, $id){
        DB::delete('delete from designations where id = ?',[$id]);
        return redirect()->route('designation.index')->with(['success'=>'Form is successfully Deleted!']);

    }



}
