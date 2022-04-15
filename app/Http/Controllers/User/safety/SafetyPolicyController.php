<?php

namespace App\Http\Controllers\User\safety;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\s_rule;
use Auth;
use PDF;

class SafetyPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $values=s_rule::orderby('id','desc')->get();
        return view('dashboards.admins.safety.index',compact('user'));
    }

    public function policyindex()
    {
        $user = Auth::user();
        return view('dashboards.admins.safety.g_policy',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $request->validate([
            'title'=>'required|string',
            'tagline'=>'required|string',
        ]);

        $input=new s_rule();
        $input->title=$request->input('title');
        $input->commitment=$request->input('commitment');
        $input->tagline=$request->input('tagline');
        $input->save();
        return redirect()->route('safety.index')->with('msg','Safety Generated Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user();
        $safetys=s_rule::OrderBy('id','desc')->get();

        return view('dashboards.admins.safety.s_view',compact('safetys','user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function modify($id)
    {
        $user = Auth::user();
        $data =s_rule::where('id',$id)->first();
        return view('dashboards.admins.safety.s_view',compact('user','data'));
    }
    public function  modifystore(Request $request,$id){

        $input=s_rule::find($id);
        $input->title=$request->input('title');
        $input->commitment=$request->input('commitment');
        $input->tagline=$request->input('tagline');
        $input->update();
        return redirect()->route('safety.safety-view');
    }



    public function download($id){

        $data=s_rule::where('id',$id)->first();
        $pdf = PDF::loadView('dashboards.admins.safety.pdf',compact('data'));
         return $pdf->download('SafetyPolicyRules.pdf');
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
        s_rule::find($id)->delete();
        return back();
    }
}
