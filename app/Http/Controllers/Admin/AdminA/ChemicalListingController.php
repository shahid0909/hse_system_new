<?php


namespace App\Http\Controllers\Admin\AdminA;


use App\Http\Controllers\Controller;

use App\Models\Chemical;

use App\Models\ChemicalListing;
use App\Models\l_ppe;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChemicalListingController extends Controller
{

    public function index(){
        $user = Auth::user();
        $chemicals = Chemical::all();
        $ppe = l_ppe::orderby('id','desc')->get();

        return view('dashboards.admins.chemicalListing.index', compact('user', 'chemicals','ppe'));
    }

    public function chemicalData($id){
        $chemicalData = DB::table('chemical as c')
            ->leftJoin('l_supplier as s', 's.id', '=', 'c.supplier_id')
            ->leftJoin('l_manufactures as m', 'm.id', '=', 'c.manufacturer_id')
            ->leftJoin('l_case as cs', 'cs.id', '=', 'c.cas_id')
            ->leftJoin('l_hazard as h', 'h.id', '=', 'c.hazard_id')
            ->leftJoin('l_physical_form as ph', 'ph.id', '=', 'c.physical_form_id')
            ->select('C.chemical_Name AS chemical_name','ph.physicalform',
                'c.product_code', 'c.product_indentifier', 'c.che_image', 'c.che_sds_image', 'c.che_sds_bn_image',
                's.SupplierName', 'm.name AS manufacture', 'cs.caseName', 'h.image AS hazard_image')
            ->where('c.id', $id)
            ->get();
        return json_encode($chemicalData);
    }

    public function store(Request $request){


        $input =new ChemicalListing();
        $input->chemical_id = $request->input('chemical_id');
        $input->ppe_id = $request->input('ppe_id');
        $input->usage = $request->input('usage');
        $input->employee = $request->input('employee');
        $input->no_of_emplyees = $request->input('no_of_emplyees');
        $input->quantity = $request->input('quantity');
        $input->lang = $request->input('lang');
        $input->active_yn = $request->input('active_yn');
        $input->sds_issue_date = $request->input('sds_issue_date');
        $input->sds_link = $request->input('sds_link');
        $input->remark = $request->input('remark');
        $input->signal_word = $request->input('signal_word');

        $input->save();


        return redirect()->back()->with(['success'=>'Form is successfully submitted!']);

    }
    public function datatable(Request $request)
    {


        $data = ChemicalListing::with('chemical',
            'chemical.physicalForm','chemical.manufacturer','chemical.supplier','ppe')->get();
//        dd($data>chemical);

        return datatables()
            ->of($data)

            ->editColumn('action',function ($query) {
                return  '<a href="' . route('chemical_listing.edit', $query['id']) . '" class=""><i class="icofont-edit"></i></a>||<a href="' . route('chemical_listing.destroy', $query['id']) . '" class="btn btn-danger" onclick="return confirm(\'Are You Sure You Want To Delete This Manufacturer?\')"> <i class="icofont-delete-alt"></i></a>';
            }
            )
        ->addIndexColumn()
        ->make(true);
    }



}
