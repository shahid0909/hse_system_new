<?php

namespace App\Http\Controllers\admin\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MeetingModel;
use App\Models\SafetyCommittee;
use Auth;
use DB;
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
        return view('dashboards.admins.meeting.index',compact('user','values'));
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

        $meeting=new MeetingModel();
        $meeting->title=$request->input('title');
        $meeting->date=$request->input('date');
        $meeting->time=$request->input('time');
        $meeting->venue=$request->input('venue');
        $meeting->m_attend_id=$request->input('m_attend_id');
        $meeting->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function datatable()
    {

        $data=MeetingModel::orderBy('id','DESC')->get();
        return datatables()->of($data)
            ->addIndexColumn()
            ->make();
    }




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
        //
    }
}
