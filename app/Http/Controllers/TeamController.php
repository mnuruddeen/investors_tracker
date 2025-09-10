<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $title = "Team Members";
        $teams = Team::all();
        return view('team.index', compact('title','teams'));
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
            'document' =>'required',
            'name' =>'required',
            'rank' =>'required',
            'facebook' =>'',
            'twitter' =>'',
            'instagram' =>'',
            'linkedin' =>'',
        ]);
        $document = "";
        if(isset($data['document']))
        {
            $document = time()."_team.".request()->document->getClientOriginalExtension();
            request()->document->move('main/img/teams', $document);
        }

        $slide = Team::create([
            'name' => $data['name'],
            'rank' => $data['rank'],
            'facebook' => $data['facebook'],
            'twitter' => $data['twitter'],
            'instagram' => $data['instagram'],
            'linkedin' => $data['linkedin'],
            'image' => $document,
        ]);

        if($slide){
            return redirect('teams')->with('success','Team Member Added Successfully');
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
    public function update(Request $request, Team $team)
    {
        $data = $request->validate([
            'document' =>'',
            'name' =>'required',
            'rank' =>'required',
            'facebook' =>'',
            'twitter' =>'',
            'instagram' =>'',
            'linkedin' =>'',
        ]);
        $document = $team->image;
        if(isset($data['document']))
        {
            if($team->image){
                unlink('main/img/teams/'.$team->image);
            }
            $document = time()."_team.".request()->document->getClientOriginalExtension();
            request()->document->move('main/img/teams', $document);
        }

        $update = $team->update([
            'name' => $data['name'],
            'rank' => $data['rank'],
            'facebook' => $data['facebook'],
            'twitter' => $data['twitter'],
            'instagram' => $data['instagram'],
            'linkedin' => $data['linkedin'],
            'image' => $document,
        ]);

        if($update){
            return redirect('teams')->with('success','Team Member Updated Successfully');
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
        $team = Team::findOrFail(decrypt($id));
        if($team->image){
            unlink('main/img/teams/'.$team->image);
        }
        $team->delete();
        return redirect()->back()->with('success','Team Member Deleted Successfully');
    }
}
