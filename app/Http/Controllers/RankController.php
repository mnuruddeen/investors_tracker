<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Cadre;
use App\Models\Rank;
use App\Rules\UniqueGradeLevelForCadre;
use Illuminate\Support\Facades\DB;


class RankController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $title = "Ranks";
        $ranks = Rank::orderBy('id','DESC')->get();
        $cadres = Cadre::all();
        return view('rank.index',compact('title','ranks','cadres'));
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
            'rank' =>'required',
            'grade_level' => ['required','min:2', new UniqueGradeLevelForCadre($request->cadre)],
        ]);

        $rank = Rank::create([
            'cadre_id'=>$data['cadre'],
            'rank'=>$data['rank'],
            'grade_level'=>$data['grade_level'],
        ]);

        if($rank){
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
    public function update(Request $request, Rank $rank)
    {
        //dd($request->all());
        $data = $request->validate([
            'cadre' =>'required',
            'rank' =>'required',
            'grade_level' =>'required',
        ]);
        $update = $rank->update([
            'cadre_id'=>$data['cadre'],
            'rank'=>$data['rank'],
            'grade_level'=>$data['grade_level'],
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
        $rank = Rank::find(decrypt($id));

        //UNLINK EMPLOYEES WITH THIS RANK
        $employees = Employee::where('rank_id',$rank->id)->get();
        foreach($employees As $employee){
            $e = Employee::find($employee->id);
            $e->update([
                'cadre_id'=>NULL,
                'rank_id'=>NULL,
                'verify'=>0,
            ]);
        }
        
        $rank->delete();
        return redirect()->back()->with('success','Record Deleted Successfully');
    }

    public function get_ranks($id){
        echo json_encode(DB::table('ranks')->where('cadre_id', $id)->where('grade_level','<=',16)->orderBy('grade_level','ASC')->get());
    }
}
