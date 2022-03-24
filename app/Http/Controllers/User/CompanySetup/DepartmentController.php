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
    public function index(){

        $user = Auth::user();
        $department = Department::all();
        return view('dashboards.users.companySetup.l_department', compact('user','department'));

    }

    public function store(Request $request)

    {
         

         $this->validate($request,[
            'department_name'=>'required',
            'dept_loc'=>'required',
            'dept_phone'=>'required',
            'active_yn'=>'required',
            'depertment_image'=>'required',

        ]);

        $department = new Department;
        $department->depertment_name =$request->input('department_name');
        $department->depertment_location =$request->input('dept_loc');
        $department->status =$request->input('active_yn');
        $department->phone=$request->dept_phone;
       
       $date = Carbon::now()->format('his')+rand(1000,9999);
       if($depertment_image = $request->file('depertment_image')){
            $extention = $request->file('depertment_image')->getClientOriginalExtension();
            $imageName = $date.'.'.$extention;
            $path = public_path('image/Department');
            $depertment_image->move($path,$imageName);
            $department->depertment_image = $imageName;
        }  
        else{
            $department->depertment_image = "null";
        }
        


        if($department->save())
        {

         return redirect()->back()->with('success','Departments information successfully store.');
        }

    }


  


      public function edit ($id)
      {

     
        $user = Auth::user();
         return view('dashboards.users.companySetup.l_department', compact('user'));
        $department =Department::all();
        $data = Department::where('id',$id)->first();

         return view('dashboards.users.companySetup.l_department', compact('user','department','data'));


    }



 public function  update(Request $request,$id){

           $request->validate([
           'department_name'=>'required',
            'dept_loc'=>'required',
            'dept_phone'=>'required',
            'status'=>'required',
            'depertment_image'=>'required',
        ]);



        $input = Department::find($id);

        $input->department_name = $request->input('department_name');
        $input->dept_loc = $request->input('dept_loc');
        $input->dept_phone= $request->input('dept_phone');
        $input->status = $request->input('status');
        $input->depertment_image = $request->input('depertment_image');
        $input -> update();

        return redirect()->route('department.index')->with(['success'=>'Form is successfully Updated!']);
      
    }


    public function datatable()
    {

        $data = Department::orderBy('id','DESC')->get();

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
                return  '<a href="' . route('department.edit', $query['id']) . '" class=""><i class="icofont-edit"></i></a> || <a href="' . route('department.destroy', $query['id']) . '" class="btn btn-danger" onclick="return confirm(\'Are You Sure You Want To Delete This department?\')"> <i class="icofont-delete-alt"></i></a>';
            }
            )->make();
    }


  


      public function destroy( $id) 

      {

             $Department = Department::findOrFail($id);
        
        if($Department){
            if(file_exists('image/Department/'.$Department->image) AND !empty($Department->image))
            {
                unlink('image/Department/'.$Department->image);
            }
            $Department->delete();
            return redirect()->back()->with('success','Department information successfully deleted.');
        }

    }


   






}
