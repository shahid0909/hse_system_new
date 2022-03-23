<?php


namespace App\Http\Controllers\Admin\AdminA\Setup;


use App\Http\Controllers\Controller;
use App\Models\l_physicalForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class PhysicalFormController extends Controller
{
    public function index(){

        $user = Auth::user();
        return view('dashboards.admins.setup.l_physical_form.index', compact('user'));

    }

    public function store(Request $request){

        l_physicalForm::create([
            'physicalform' => $request->physical_form,
            'status' => $request->status,
        ]);

        return redirect()->back()->with(['success'=>'Form is successfully submitted!']);

    }

    public function datatable(){

        $data = l_physicalForm::orderBy('id','desc')->get();

        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->addColumn('status', function ($query) {
                if($query->status == 'Y'){
                    return 'Active';
                }else{
                    return 'In-Active';
                }

            })
            ->editColumn('action',function ($query) {
                return  '<a href="' . route('l_physical_form.edit', $query['id']) . '" class="btn btn-primary"><i class="icofont-edit"></i></a>||<a href="' . route('l_physical_form.destroy', $query['id']) . '" class="btn btn-danger" onclick="return confirm(\'Are You Sure You Want To Delete This Cas?\')"> <i class="icofont-delete-alt"></i></a>';
            }
            )->make(true);

    }


    public function edit (Request $request, $id){

        $user = Auth::user();
        $data = l_physicalForm::where('id', $id)->first();

        return view('dashboards.admins.setup.l_physical_form.index', compact('data','user'));


    }

    public function update(Request $request, $id){

        $physicalform = l_physicalForm::find($id);
        $physicalform->physicalform = $request->input('physical_form');
        $physicalform->status = $request->input('status');
        $physicalform->update();


        return redirect()->route('l_physical_form.index')->with(['success'=>'Form is successfully submitted!']);
    }

    public function destroy(Request $request, $id){
        DB::delete('delete from l_physical_form where id = ?',[$id]);
        return redirect()->route('l_physical_form.index')->with(['success'=>'Form is successfully Deleted!']);

    }


}
