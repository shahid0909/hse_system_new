<?php

namespace App\Http\Controllers\User\WorkInspection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\create_inspection;
use Illuminate\Support\Facades\DB;


class CreateIspectionController extends Controller
{
      public function index()
    {
        $user = Auth::user();
        $data = null;
        return view('dashboards.users.workplaceInspection.create_inspection', compact('user','data'));

    }

    public function store(Request $request)

    {
      // dd($request);
        $this->validate($request, [
            'location' => 'required',
            'pic' => 'required',
            'unsafe' => 'required',
            'text' => 'required',
            'Justification' => 'required',
            'admitdate' => 'required',
            'targetdate' => 'required',
            'priority' => 'required',

        ]);

        $input = new create_inspection;
       // dd($input);

        $input->location = $request->input('location');
        $input->pic = $request->input('pic');
        $input->unsafe = $request->input('unsafe');
        $input->text = $request->input('text');
        $input->Justification = $request->input('Justification');
        $input->admitdate = $request->input('admitdate');
        $input->targetdate = $request->input('targetdate');
        $input->priority = $request->input('priority');


        if ($image = $request->file('image')) {
            $destinationPath = 'image/workplace';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        if ($input->save()) {

            return redirect()->back()->with('success', 'Departments information successfully store.');
        }

    }

     public function datatable()
     {

          $list = create_inspection::orderby('id','desc')->get();

        return datatables()
            ->of($list)

             ->addColumn('image', function ($query) {
                $url=asset("image/workplace/$query->image");
                return '<img src='.$url.' border="0" width="40"  class="img-rounded" align="center" />';
            })
            ->editColumn('action', function ($query) {
                return '<a href="' . route('create_ispection.edit', $query['id']) . '" class=""><i class="icofont-edit"></i></a> ||
                <a href="' . route('create_ispection.destroy', $query['id']) . '" class="" onclick="return confirm(\'Are You Sure You Want To Delete This Item?\')"> <i class="icofont-delete-alt"></i></a>';
            })
              ->addIndexColumn()
            ->escapeColumns('image')
            ->make();


     }


  public function  edit($id){

     $user = Auth::user();
      $data = create_inspection::where('id', $id)->first();

        return view('dashboards.users.workplaceInspection.create_inspection', compact('data','user'));
    }


    public function update(Request $request, $id)
    {


        $input = create_inspection::find($id);
        $input->location = $request->input('location');
        $input->pic = $request->input('pic');
         $input->unsafe = $request->input('unsafe');
        $input->text = $request->input('text');
         $input->Justification = $request->input('Justification');
        $input->admitdate = $request->input('admitdate');
         $input->targetdate = $request->input('targetdate');
        $input->priority = $request->input('priority');


        if ($image = $request->file('image')) {
            $destinationPath = 'image/workplace';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $input->update();

        return redirect()->route('create_ispection.index')->with(['success' => 'Form is successfully Updated!']);

    }


     public function destroy(Request $request,$id)
         {


        $list = create_inspection::findOrFail($id);

        if ($list) {
            if (file_exists('image/workplace/' . $list->image) and !empty($list->image)) {
                unlink('image/workplace/' . $list->image);
            }
            $list->delete();
            return redirect()->back()->with('success', 'inspection information successfully deleted.');
        }
         }



}
