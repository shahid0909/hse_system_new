<?php


namespace App\Http\Controllers\Admin\AdminA;
use App\Models\Chemical;
use App\Models\l_case;
use App\Models\l_ghslabel;
use App\Models\l_hazard;
use App\Models\l_manufacturer;
use App\Models\l_physicalForm;
use App\Models\l_supplier;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ChemicalController extends Controller
{

    public function index(Request $request){
//        dd(request()->breadcrumbs()->segments());
        $user = Auth::user();
        $physicalForm = l_physicalForm::orderby('id','desc')->get();
        $supplier = l_supplier::orderby('id','desc')->get();
        $healthHazards = l_hazard::orderby('id','desc')->get();
        $ghsLabel = l_ghslabel::orderby('id','desc')->get();
        $case = l_case::orderby('id','desc')->get();
        $manufacturer = l_manufacturer::orderby('id','desc')->get();
        $chemical = Chemical::orderby('id','desc')->get();
//        dd($chemical);
        $data = null;

        return view('dashboards.admins.chemicallist.index',compact('user','manufacturer','case','physicalForm','supplier','healthHazards','ghsLabel','chemical','data'));

    }

    public function store(Request $request){

//       $cas_id = implode(',', $request['cas_id']);

        $request->validate([
            'Chemical_Name' => 'required',
            'product_code' => 'required',
            'product_indentifier' => 'required',
            'cas_id' => 'required',
            'physical_form_id' => 'required',
            'manufacturer_id' => 'required',
            'supplier_id' => 'required',
            'hazard_id' => 'required',
            'ghs_label_id' => 'required',
            'che_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input =new Chemical();
        $input->Chemical_Name = $request->input('Chemical_Name');
        $input->product_code = $request->input('product_code');
        $input->product_indentifier = $request->input('product_indentifier');
        $input->cas_id = implode(', ', $request['cas_id']);
        $input->physical_form_id = $request->input('physical_form_id');
        $input->manufacturer_id = $request->input('manufacturer_id');
        $input->supplier_id = $request->input('supplier_id');
        $input->hazard_id = implode(', ', $request['hazard_id']);
        $input->ghs_label_id = implode(', ', $request['ghs_label_id']);
        $input->remarks = $request->input('remarks');
        $input->active_yn = $request->input('active_yn');

//dd($input);
        if ($che_image = $request->file('che_image')) {
            $destinationPath = 'image/chemical/chemicalimage';
            $cheImage = date('YmdHis') . "." . $che_image->getClientOriginalExtension();
            $che_image->move($destinationPath, $cheImage);
            $input['che_image'] = "$cheImage";
        }

        if ($che_sds_image = $request->file('che_sds_image')) {
            $destinationPath = 'image/chemical/cheSdsImage';
            $cheSdsImage = date('YmdHis') . "." . $che_sds_image->getClientOriginalExtension();
            $che_sds_image->move($destinationPath, $cheSdsImage);
            $input['che_sds_image'] = "$cheSdsImage";
        }

        if ($che_sds_bn_image = $request->file('che_sds_bn_image')) {
            $destinationPath = 'image/chemical/cheSdsBnImage';
            $cheSdsBnImage = date('YmdHis') . "." . $che_sds_bn_image->getClientOriginalExtension();
            $che_sds_bn_image->move($destinationPath, $cheSdsBnImage);
            $input['che_sds_bn_image'] = "$cheSdsBnImage";
        }

        $input->save();

//        if($input->save()){
//            $master_id = Chemical::latest()->first();
//            dd($master_id->Chemical_Name);
//        }


        return redirect()->back()->with(['success'=>'Form is successfully submitted!']);


    }

    public function edit(Request $request, $id){

        $user = Auth::user();
        $physicalForm = l_physicalForm::orderby('id','desc')->get();
        $supplier = l_supplier::orderby('id','desc')->get();
        $healthHazards = l_hazard::orderby('id','desc')->get();
        $ghsLabel = l_ghslabel::orderby('id','desc')->get();
        $case = l_case::orderby('id','desc')->get();
        $manufacturer = l_manufacturer::orderby('id','desc')->get();
        $chemical = Chemical::orderby('id','desc')->get();
        $data = Chemical::where('id',$id)->first();
        $cas_id = explode(", ", $data->cas_id);
        $hazard_id = explode(", ", $data->hazard_id);
        $ghs_label_id = explode(", ", $data->ghs_label_id);


        return view('dashboards.admins.chemicallist.index',compact('user','manufacturer','case','physicalForm','supplier','healthHazards','ghsLabel','chemical','data','cas_id','hazard_id','ghs_label_id'));


    }

    public function update (Request $request,$id){


        $request->validate([
            'Chemical_Name' => 'required',
            'product_code' => 'required',
            'product_indentifier' => 'required',
            'cas_id' => 'required',
            'physical_form_id' => 'required',
            'manufacturer_id' => 'required',
            'supplier_id' => 'required',
            'hazard_id' => 'required',
            'ghs_label_id' => 'required',
        ]);
//        dd($request);
        $chemical = Chemical::find($id);

        $chemical->Chemical_Name = $request->input('Chemical_Name');
        $chemical->product_code = $request->input('product_code');
        $chemical->product_indentifier = $request->input('product_indentifier');
        $chemical->cas_id =  implode(', ', $request['cas_id']);
        $chemical->physical_form_id = $request->input('physical_form_id');
        $chemical->manufacturer_id = $request->input('manufacturer_id');
        $chemical->supplier_id = $request->input('supplier_id');
        $chemical->hazard_id = implode(', ', $request['hazard_id']);
        $chemical->ghs_label_id = implode(', ', $request['ghs_label_id']);
        $chemical->remarks = $request->input('remarks');
        $chemical->active_yn = $request->input('active_yn');


        if ($che_image = $request->file('che_image')) {
            $destinationPath = 'image/chemical/chemicalimage';
            $cheImage = date('YmdHis') . "." . $che_image->getClientOriginalExtension();
            $che_image->move($destinationPath, $cheImage);
            $chemical['che_image'] = "$cheImage";
        }else{
            unset($chemical['che_image']);
        }

        if ($che_sds_image = $request->file('che_sds_image')) {
            $destinationPath = 'image/chemical/cheSdsImage';
            $cheSdsImage = date('YmdHis') . "." . $che_sds_image->getClientOriginalExtension();
            $che_sds_image->move($destinationPath, $cheSdsImage);
            $chemical['che_sds_image'] = "$cheSdsImage";
        }else{
            unset($chemical['che_sds_image']);
        }

        if ($che_sds_bn_image = $request->file('che_sds_bn_image')) {
            $destinationPath = 'image/chemical/cheSdsBnImage';
            $cheSdsBnImage = date('YmdHis') . "." . $che_sds_bn_image->getClientOriginalExtension();
            $che_sds_bn_image->move($destinationPath, $cheSdsBnImage);
            $chemical['che_sds_bn_image'] = "$cheSdsBnImage";
        }else{
            unset($chemical['che_sds_bn_image']);
        }

        $chemical->update();

        return redirect()->route('chemical.index')->with(['success'=>'Form is successfully Updated!']);

    }

    public function destroy(Request $request) {

        $data = Chemical::find($request->id);

        unlink("image/chemical/chemicalimage/".$data->che_image);

        Chemical::where("id", $data->id)->delete();

        return redirect()->route('chemical.index')->with(['success'=>'Form is successfully Deleted!']);

    }



}
