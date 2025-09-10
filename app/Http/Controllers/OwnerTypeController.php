<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OwnerType;

class OwnerTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Owner Types";
        $owner_types = OwnerType::all();
        return view('owner_type.index', compact('title','owner_types'));
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
            'name' =>'required|unique:owner_types,name',
        ]);

        $category = OwnerType::create([
            'name' => $data['name'],
        ]);

        if($category){
            return redirect('owner_types')->with('success','Owner Type Added Successfully');
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
    public function update(Request $request, OwnerType $owner_type)
    {
        $data = $request->validate([
            'name' =>'required',
        ]);
        
        $update = $owner_type->update([
            'name' => $data['name'],
        ]);

        if($update){
            return redirect('owner_types')->with('success','Owner Type Updated Successfully');
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
        $owner_type = OwnerType::findOrFail(decrypt($id));
        $owner_type->delete();
        return redirect()->back()->with('success','Owner Type Deleted Successfully');
    }
}
