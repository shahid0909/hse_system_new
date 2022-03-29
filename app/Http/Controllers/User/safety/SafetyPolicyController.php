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
    public function show()
    {
        $user = Auth::user();
        $safetys=s_rule::OrderBy('id','desc')->get();

        // $safetys = [
        //    's_head' => $demo->s_head,
        //     'rules_a' => $demo->rules_a,
        //     'r ules_b' => $demo->rules_b,
        //     'rules_c' => $demo->rules_c,
        //     'rules_d' => $demo->rules_d,
        //     'rules_e' => $demo->rules_e,
        //     'rules_f' => $demo->rules_f
        // ];

        // dd($safetys);

        // $pdf = PDF::loadView('dashboards.admins.safety.s_view', $safetys);
        // return $pdf->download('Rouls.pdf');
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
        $input->s_head=$request->input('s_head');
        $input->rules_a=$request->input('rules_a');
        $input->rules_b=$request->input('rules_b');
        $input->rules_c=$request->input('rules_c');
        $input->rules_d=$request->input('rules_d');
        $input->rules_e=$request->input('rules_e');
        $input->rules_f=$request->input('rules_f');
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
