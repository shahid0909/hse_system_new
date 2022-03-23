<?php

namespace App\Http\Controllers\Admin\AdminA\Setup;

use App\Http\Controllers\Controller;

use App\Models\l_supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{

    public function index()
    {

        $user = Auth::user();
        $data = '';
        return view('dashboards.admins.setup.l_supplier.index', compact('user','data'));
    }


    public function store(Request $request){

        l_supplier::create([
            'suppliername' => $request->supplier_name,
            'contactNo' => $request->contactNo,
            'email' => $request->supplier_email,
            'address' => $request->address,
            'status' => '1',
        ]);

        return redirect()->back()->with(['success'=>'Form is successfully submitted!']);

    }

    public function datatable(){

        $data = l_supplier::orderBy('id','desc')->get();

        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->addColumn('status', function ($query) {
                if($query->status == '1'){
                    return 'Active';
                }else{
                    return 'In-Active';
                }

            })
            ->editColumn('action',function ($query) {
                return  '<a href="' . route('l_supplier.edit', $query['id']) . '" class="btn btn-primary"><i class="icofont-edit"></i></a>||<a href="' . route('l_supplier.destroy', $query['id']) . '" class="btn btn-danger" onclick="return confirm(\'Are You Sure You Want To Delete This Supplier?\')"> <i class="icofont-delete-alt"></i></a>';
            }
            )->make(true);

    }


    public function edit (Request $request, $id){

        $user = Auth::user();
        $data = l_supplier::where('id', $id)->first();

        return view('dashboards.admins.setup.l_supplier.index', compact('data','user'));


    }

    public function update(Request $request, $id){



        $supplier = l_supplier::find($id);

        $supplier->suppliername = $request->input('supplier_name');
        $supplier->contactNo = $request->input('contactNo');
        $supplier->email = $request->input('supplier_email');
        $supplier->address = $request->input('address');
        $supplier->update();


        return redirect()->route('l_supplier.index')->with(['success'=>'Form is successfully submitted!']);
    }

    public function destroy(Request $request, $id){
         DB::delete('delete from l_supplier where id = ?',[$id]);
        return redirect()->route('l_supplier.index')->with(['success'=>'Form is successfully Deleted!']);

    }


}
