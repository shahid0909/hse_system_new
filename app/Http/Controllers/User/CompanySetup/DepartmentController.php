<?php


namespace App\Http\Controllers\User\CompanySetup;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Department;
use carbon\carbon;


class DepartmentController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $department = Department::all();
        $data = '';
        return view('dashboards.users.companySetup.l_department', compact('user', 'department','data'));

    }

    public function store(Request $request)

    {

        $this->validate($request, [
            'department_name' => 'required',
            'dept_loc' => 'required',
            'dept_phone' => 'required',
            'depertment_image' => 'required',

        ]);

        $department = new Department;
        $department->depertment_name = $request->input('department_name');
        $department->depertment_location = $request->input('dept_loc');
        $department->status ='Y';
        $department->phone = $request->dept_phone;

        if ($depertment_image = $request->file('depertment_image')) {
            $destinationPath = 'image/Department';
            $profileImage = date('YmdHis') . "." . $depertment_image->getClientOriginalExtension();
            $depertment_image->move($destinationPath, $profileImage);
            $department['depertment_image'] = "$profileImage";
        }

        if ($department->save()) {

            return redirect()->back()->with('success', 'Departments information successfully store.');
        }

    }

    public function datatable()
    {
        $data = Department::orderBy('id', 'DESC')->get();

        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->addColumn('depertment_image', function ($query) {
                $url=asset("image/Department/$query->depertment_image");
                return '<img src='.$url.' border="0" width="40"  class="img-rounded" align="center" />';
            })
            ->editColumn('action', function ($query) {
                return '<a href="' . route('department.edit', $query['id']) . '" class=""><i class="icofont-edit"></i></a> || <a href="' . route('department.destroy', $query['id']) . '" class="" onclick="return confirm(\'Are You Sure You Want To Delete This department?\')"> <i class="icofont-delete-alt"></i></a>';
            })
            ->escapeColumns('depertment_image')
            ->make();
    }



    public function edit($id)
    {
        $user = Auth::user();
        $data = Department::where('id', $id)->first();

        return view('dashboards.users.companySetup.l_department', compact('user', 'data'));
    }


    public function update(Request $request, $id)
    {


        $department = Department::find($id);
        $department->depertment_name = $request->input('department_name');
        $department->depertment_location = $request->input('dept_loc');
        $department->status ='Y';
        $department->phone = $request->dept_phone;

        if ($depertment_image = $request->file('depertment_image')) {
            $destinationPath = 'image/Department';
            $profileImage = date('YmdHis') . "." . $depertment_image->getClientOriginalExtension();
            $depertment_image->move($destinationPath, $profileImage);
            $department['depertment_image'] = "$profileImage";
        }else{
            unset($department['depertment_image']);
        }

        $department->update();

        return redirect()->route('department.index')->with(['success' => 'Form is successfully Updated!']);

    }


    public function destroy($id)

    {

        $Department = Department::findOrFail($id);

        if ($Department) {
            if (file_exists('image/Department/' . $Department->image) and !empty($Department->image)) {
                unlink('image/Department/' . $Department->image);
            }
            $Department->delete();
            return redirect()->back()->with('success', 'Department information successfully deleted.');
        }

    }


}
