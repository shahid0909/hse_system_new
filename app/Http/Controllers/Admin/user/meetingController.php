<?php

namespace App\Http\Controllers\admin\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Meeting;
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
            $s_values=Meeting::all();
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

        $meeting->date=$request->input('date');
        $meeting->time=$request->input('time');
        $meeting->venue=$request->input('venue');
        $meeting['p_member']= $request->input('p_member');
        $meeting->introduction=$request->input('introduction');
        $meeting->endorsement=$request->input('endorsement');
        $meeting['agenda']= json_encode($request->input('agenda'));
        $meeting['pic']=  json_encode($request->input('pic'));
        $meeting['remarks']=json_encode( $request->input('remarks'));
        $meeting->closing=$request->input('closing');
        $meeting->save();
       return back();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Meeting::find($id)->delete();
       return back();
    }

    public function show($id){
     $user=Auth::user();
     $values=Meeting::where('id','=',$id)->first();
       return  view('dashboards.admins.meeting.report',compact('user','values'));
    }

    public function reportpdf($id){
        $user=Auth::user();
        $values=Meeting::where('id','=',$id)->first(); 
        $pdf = PDF::loadView('dashboards.admins.meeting.report-pdf', compact('values','user'));
        return $pdf->download('Meeting-Report.pdf');
    }
}
