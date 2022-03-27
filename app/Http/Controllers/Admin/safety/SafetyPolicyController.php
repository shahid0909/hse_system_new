<?php

namespace App\Http\Controllers\Admin\safety;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\s_rule;
use Auth;

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
        $request->validate([
            's_head'=>'required|string',
            'rules_a'=>'required|string',
            'rules_b'=>'required|string',
            'rules_c'=>'required|string',
            'rules_d'=>'required|string',
            'rules_e'=>'required|string',
            'rules_f'=>'required|string',
        ]);
        $input=new s_rule();
        $input->s_head=$request->input('s_head');
        $input->rules_a=$request->input('rules_a');
        $input->rules_b=$request->input('rules_b');
        $input->rules_c=$request->input('rules_c');
        $input->rules_d=$request->input('rules_d');
        $input->rules_e=$request->input('rules_e');
        $input->rules_f=$request->input('rules_f');
        $input->save();
        return redirect()->route('safety.index')->with('msg','Safety Generated Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
