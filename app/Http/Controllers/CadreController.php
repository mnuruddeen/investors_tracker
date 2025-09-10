<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadre;
use App\Models\Employee;
use App\Models\Rank;

class CadreController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Cadres";
        $cadres = Cadre::all();
        return view('cadre.index',compact('title','cadres'));
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
        $data = $request->validate([
            'cadre' =>'required',
        ]);

        $cadre = Cadre::create([
            'cadre'=>$data['cadre'],
        ]);

        if($cadre){
            return redirect()->back()->with('success','Record Added Successfully');
        }else{
            return redirect()->back()->with('error','Sorry Something went wrong');
        }
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
    public function update(Request $request, Cadre $cadre)
    {
        $data = $request->validate([
            'cadre' =>'required'
        ]);
        
        $update = $cadre->update([
            'cadre'=>$data['cadre']
        ]);
        if($update){
            return redirect()->back()->with('success','Record Updated Successfully');
        }else{
            return redirect()->back()->with('error','Sorry Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cadre = Cadre::find(decrypt($id));
        
        //UNLINK EMPLOYEES WITH THIS CARDRE
        $employees = Employee::where('cadre_id',$cadre->id)->get();
        foreach($employees As $employee){
            $e = Employee::find($employee->id);
            $e->update([
                'cadre_id'=>NULL,
                'rank_id'=>NULL,
                'verify'=>0,
            ]);
        }
        //DELETE RANK ASSOCIATED WITH THIS CADRE
        $ranks = Rank::where('cadre_id',$cadre->id)->get();
        foreach($ranks As $rank){
            $r = Rank::find($rank->id);
            $r->delete();
        }
        $cadre->delete();
        return redirect()->back()->with('success','Record Deleted Successfully');
    }
}
