<?php

namespace App\Http\Controllers\Admin\AdminA\Setup;

use App\Http\Controllers\Controller;
use App\Models\l_manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManufacturerController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        return view('dashboards.admins.setup.l_manufacturer.index', compact('user'));
    }

    public function store(Request $request, $id=null)
    {

        l_manufacturer::create([
            'name' => $request->name,
            'address' => $request->address,
            'contactNo' => $request->contactNo,
            'email' => $request->email,
            'status' => $request->status,
        ]);

         return redirect()->route('l_manufacturer.index')->with(['success'=>'Form is successfully submitted!']);

    }

    public function edit($id)
    {
        $user = Auth::user();
        $data['insertedData'] = l_manufacturer::where('id', $id)->get();
        return view('dashboards.admins.setup.l_manufacturer.index', compact('data', 'user'));
    }

    public function update(Request $request, $id){


        $manufacture = l_manufacturer::find($id);

        $manufacture->suppliername = $request->input('supplier_name');
        $manufacture->contactNo = $request->input('contactNo');
        $manufacture->email = $request->input('email');
        $manufacture->address = $request->input('address');
        $manufacture->update();


        return redirect()->route('l_supplier.index')->with(['success'=>'Form is successfully submitted!']);
    }

    public function datatable(Request $request)
    {
        $data = l_manufacturer::orderBy('id','DESC')->get();
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
                return  '<a href="' . route('l_manufacturer.edit', $query['id']) . '" class=""><i class="icofont-edit"></i></a>||<a href="' . route('l_manufacturer.destroy', $query['id']) . '" class="btn btn-danger" onclick="return confirm(\'Are You Sure You Want To Delete This Manufacturer?\')"> <i class="icofont-delete-alt"></i></a>';
            }
            )->make(true);
    }

    public function destroy(Request $request, $id){
        DB::delete('delete from l_manufactures where id = ?',[$id]);
        return redirect()->route('l_manufacturer.index')->with(['success'=>'Form is successfully Deleted!']);

    }


}
