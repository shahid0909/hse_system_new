<?php


namespace App\Http\Controllers\Admin\AdminA\Setup;


use App\Http\Controllers\Controller;
use App\Models\l_case;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class CasController extends Controller
{
    public function index(){

        $user = Auth::user();
        return view('dashboards.admins.setup.l_cas.index', compact('user'));

    }

    public function store(Request $request){
//dd($request);
        l_case::create([
            'caseName' => $request->cas_name,
            'ingredient' => $request->ing_name,
            'status' => $request->status,
        ]);

        return redirect()->back()->with(['success'=>'Form is successfully submitted!']);

    }

    public function datatable(){

        $data = l_case::orderBy('id','desc')->get();

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
                return  '<a href="' . route('l_cas.edit', $query['id']) . '" class="btn btn-primary"><i class="icofont-edit"></i></a>||<a href="' . route('l_cas.destroy', $query['id']) . '" class="btn btn-danger" onclick="return confirm(\'Are You Sure You Want To Delete This Cas?\')"> <i class="icofont-delete-alt"></i></a>';
            }
            )->make(true);

    }


    public function edit (Request $request, $id){

        $user = Auth::user();
        $data = l_case::where('id', $id)->first();

        return view('dashboards.admins.setup.l_cas.index', compact('data','user'));


    }

    public function update(Request $request, $id){


        $cas = l_case::find($id);

        $cas->caseName = $request->input('cas_name');
        $cas->ingredient = $request->input('ing_name');
        $cas->status = $request->input('status');
        $cas->update();


        return redirect()->route('l_cas.index')->with(['success'=>'Form is successfully updated!']);
    }

    public function destroy(Request $request, $id){
        DB::delete('delete from l_case where id = ?',[$id]);
        return redirect()->route('l_cas.index')->with(['success'=>'Form is successfully Deleted!']);

    }


}
