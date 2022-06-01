<?php

namespace App\Http\Controllers\User\meeting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Meeting;
use App\Models\meeting_details;
use App\Models\l_employee;
use App\Models\SafetyCommittee;
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
        $values = DB::table('safety_committees')
             ->leftJoin('l_employees', 'l_employees.id', '=', 'safety_committees.employee_id')
            ->get();
            // $values= l_employee::all();
            $s_values=Meeting::all();
            // $data2=meeting_details::where('meeting_id',$s_values->id)->first();
        

                        
                      
        return view('dashboards.admins.meeting.index',compact('user','values','s_values'));
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
        $meeting->meeting_date=$request->input('meeting_date');
        $meeting->time=$request->input('time');
        $meeting->venue=$request->input('venue');
        $meeting->introduction=$request->input('introduction');
        $meeting->endorsement=$request->input('endorsement');
        $meeting->closing=$request->input('closing');
        $meeting['p_member'] = implode(",",$request['p_member']);
        $meeting->save();
      // dd($request);   
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
       
       
         return redirect()->back(); 
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
        // $data = meeting::where('id', $id)->first();
        $data1 =DB::table('meetings')->select('meetings.meeting_date','meetings.venue','meetings.time','meetings.introduction','meetings.endorsement','meetings.closing','meetings.p_member','meetings.id')
        ->where([
            ['meetings.id','=',$id],
        ])->first();
        $data2=meeting_details::where('meeting_id',$id)->get();

        return view('dashboards.admins.meeting.index',compact('user','values','data1','data2'));
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
        $meeting->meeting_date=$request->input('meeting_date');
        $meeting->time=$request->input('time');
        $meeting->venue=$request->input('venue');
        $meeting->introduction=$request->input('introduction');
        $meeting->endorsement=$request->input('endorsement');
        $meeting->closing=$request->input('closing');
        $meeting['p_member'] = implode(",",$request['p_member']);
        $meeting->update();
      // dd($request);   
       $count = $request->agenda;


       foreach($count as $main=>$row)
     {
        $meeting1 =meeting_details::where('meeting_id',$id)->first();
        $meeting1->meeting_id =  $meeting->id;
        $meeting1->agenda= $request->agenda[$main];
         $meeting1->pic= $request->pic[$main];
        $meeting1->remarks= $request->remarks[$main];
        $meeting1->update(); 
      
     }
        return redirect()->route('meeting.index');

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
       return back();
    }

    public function show($id){
     $user=Auth::user();
     $data1 =DB::table('meetings')->select('meetings.meeting_date','meetings.venue','meetings.time','meetings.introduction','meetings.endorsement','meetings.closing','meetings.p_member','meetings.id')
            ->where([
                ['meetings.id','=',$id],
            ])->first();
            $data2=meeting_details::where('meeting_id',$id)->get();
            $s_values=Meeting::all();
       return  view('dashboards.admins.meeting.report',compact('user','data1','data2','s_values'));
    }

    public function reportpdf($id){
        $user=Auth::user();
        // $values=Meeting::where('id','=',$id)->first(); 
        $data1 =DB::table('meetings')->select('meetings.meeting_date','meetings.venue','meetings.time','meetings.introduction','meetings.endorsement','meetings.closing','meetings.p_member','meetings.id')
        ->where([
            ['meetings.id','=',$id],
        ])->first();
        $data2=meeting_details::where('meeting_id',$id)->get();
        $pdf = PDF::loadView('dashboards.admins.meeting.report-pdf', compact('data1','data2'));
        return $pdf->download('Meeting-Report.pdf');
    }
}
