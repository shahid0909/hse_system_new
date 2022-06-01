<?php

namespace App\Http\Controllers\User\WorkInspection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RectifiedInspection;
use Illuminate\Support\Facades\DB;
use App\Models\create_inspection;

class RectifiedInspectionController extends Controller
{



      public function index()
    {

        $user = Auth::user();

        $cri = create_inspection::all();
      

       $data = DB::table('rectified_inspections')
               ->join('create_inspections','rectified_inspections.find_inspection','create_inspections.id')

               ->select('rectified_inspections.*','create_inspections.inspection_title')->get();


             


        return view('dashboards.users.workplaceInspection.rectified_inspection', compact('user','cri','data'));

    }



    public function store(Request $request)

    {

        $user = Auth::user(); 
        $input = new RectifiedInspection;
        // dd($input);
         $input->company_id =$user->company_id;
        $input->find_inspection = $request->input('find_inspection');
        $input->date_rectified = $request->input('date_rectified');

        if ($r_image = $request->file('r_image')) {
            $destinationPath = 'image/rec_inspection';
            $profileImage = date('YmdHis') . "." . $r_image->getClientOriginalExtension();
            $r_image->move($destinationPath, $profileImage);
            $input['r_image'] = "$profileImage";
        }


        if ($input->save()) {

            return redirect()->back()->with('success', 'Departments information successfully store.');
        }

    }


    public function datatable()
    {
        $data = RectifiedInspection::with('findInsp')->orderby('id','desc')->get();


        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->addColumn('r_image', function ($query) {
                $url=asset("image/rec_inspection/$query->r_image");
                return '<img src='.$url.' border="0" width="40"  class="img-rounded" align="center" />';
            })
            ->editColumn('action', function ($query) {
                return '<a href="' . route('rectified_inspection.edit', $query['id']) . '" class=""><i class="icofont-edit"></i></a> || <a href="' . route('rectified_inspection.destroy', $query['id']) . '" class="" onclick="return confirm(\'Are You Sure You Want To Delete This Rectified-Inspection?\')"> <i class="icofont-delete-alt"></i></a>';
            })
            ->escapeColumns('depertment_image')
            ->make();
    }

      public function destroy(Request $request,$id)
    {


        $list = RectifiedInspection::findOrFail($id);

        if ($list) {
            if (file_exists('image/rec_inspection/' . $list->r_image) and !empty($list->r_image)) {
                unlink('image/rec_inspection/' . $list->r_image);
            }
            $list->delete();
            return redirect()->back()->with('success', 'inspection information successfully deleted.');
        }
    }




public function  edit($id){

        $user = Auth::user();
        $cri = create_inspection::all();
        $data = RectifiedInspection::where('id', $id)->first();



        return view('dashboards.users.workplaceInspection.rectified_inspection', compact('user','data','cri'));
    }
}
