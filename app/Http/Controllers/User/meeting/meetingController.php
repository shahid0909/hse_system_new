<?php

namespace App\Http\Controllers\User\meeting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Meeting;
use App\Models\meeting_details;
use App\Models\l_employee;
use App\Models\SafetyCommittee;
use App\Models\present_meeting_member;
use Auth;
use DB;
use PDF;
class meetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        $s_values=Meeting::all();
        $values = DB::table('safety_committees')
             ->leftJoin('l_employees', 'l_employees.id', '=', 'safety_committees.employee_id')
            ->get();
        $companies=DB::selectOne("SELECT c.company_name,c.id FROM company_profile c,users u WHERE u.company_id=c.id and  c.id='$user->company_id'");
         
                        
        return view('dashboards.admins.meeting.index',compact('user','values','s_values','companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $meeting=new Meeting();
        $meeting->company_name=$request->input('company_name');
        $meeting->meeting_date=$request->input('meeting_date');
        $meeting->time=$request->input('time');
        $meeting->venue=$request->input('venue');
        $meeting->introduction=$request->input('introduction');
        $meeting->endorsement=$request->input('endorsement');
        $meeting->closing=$request->input('closing');
        $meeting->save();  
       $count = $request->agenda;
       foreach($count as $main=>$row)
     {
        $meeting1 = new meeting_details();
        $meeting1->meeting_id =  $meeting->id;
        $meeting1->agenda= $request->agenda[$main];
         $meeting1->pic= $request->pic[$main];
        $meeting1->remarks= $request->remarks[$main];
        $meeting1->save(); 
         }
         $count1 = $request->p_member;
         foreach($count1 as $main=>$row){
             $meeting2= new present_meeting_member();
             $meeting2->meeting_id=$meeting->id;
             $meeting2->p_member=$request->p_member[$main];
             $meeting2->save();
         }
         return redirect()->back()->with('success','Data Added Successfully'); 
        }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $values = DB::table('safety_committees')
        ->leftJoin('l_employees', 'l_employees.id', '=', 'safety_committees.employee_id')
       ->get();
       $s_values=Meeting::all();
       $companies=DB::selectOne("SELECT c.company_name,c.id FROM company_profile c,users u WHERE u.company_id=c.id and  c.id='$user->company_id'");

    //    $data= Meeting::where('id','=',$id)->first();
         $data=Meeting::where('id','=',$id)->first();
         $data1=meeting_details::where('meeting_id',$id)->get();
         $data2=present_meeting_member::where('meeting_id',$id)->get();
        return view('dashboards.admins.meeting.index',compact('user','values','data','data1','data2','s_values','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $meeting=Meeting::find($id);
        $meeting->company_name=$request->input('company_name');
        $meeting->meeting_date=$request->input('meeting_date');
        $meeting->time=$request->input('time');
        $meeting->venue=$request->input('venue');
        $meeting->introduction=$request->input('introduction');
        $meeting->endorsement=$request->input('endorsement');
        $meeting->closing=$request->input('closing');
        $meeting->update();  
       $count = $request->agenda;
       foreach($count as $main=>$row)
     {
        $meeting1 = meeting_details::where('id',$id)->first();
        $meeting1->meeting_id =  $meeting->id;
        $meeting1->agenda= $request->agenda[$main];
         $meeting1->pic= $request->pic[$main];
        $meeting1->remarks= $request->remarks[$main];
        $meeting1->update(); 
     }

     $count1 = $request->p_member;
     foreach($count1 as $main=>$row){
         $meeting2=present_meeting_member::where('id',$id)->first();
         $meeting2->meeting_id=$meeting->id;
         $meeting2->p_member=$request->p_member[$main];
         $meeting2->update();
     }
        return redirect()->route('meeting.index')->with('success','Data updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       DB::table("meetings")->where("id",$id)->delete();
       DB::table("meeting_details")->where("meeting_id",$id)->delete();
       DB::table("present_meeting_members")->where("meeting_id",$id)->delete();
       return back();
    }

    public function show($id){
     $user=Auth::user();
     $data= Meeting::where('id','=',$id)->first();
     $data1=meeting_details::where('meeting_id',$id)->get();
     $data2=present_meeting_member::where('meeting_id',$id)->get();
    $s_values=Meeting::all();
     return  view('dashboards.admins.meeting.report',compact('user','data','data1','data2','s_values'));
    }

    public function reportpdf($id){
        $user=Auth::user();
        $data=Meeting::where('id','=',$id)->first();
     
        $data1=meeting_details::where('meeting_id',$id)->get();
        $data2=present_meeting_member::where('meeting_id',$id)->get();
        $pdf = PDF::loadView('dashboards.admins.meeting.report-pdf', compact('data','data1','data2'));
        return $pdf->download('Meeting-Report.pdf');
    }
}
