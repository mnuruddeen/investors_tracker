<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use\App\Models\OwnershipType;

class OwnershipTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Ownership Types";
        $ownership_types = OwnershipType::all();
        return view('ownership_type.index', compact('title','ownership_types'));
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
            'name' =>'required|unique:ownership_types,name',
        ]);

        $category = OwnershipType::create([
            'name' => $data['name'],
        ]);

        if($category){
            return redirect('ownership_types')->with('success','Ownership Type Added Successfully');
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
    public function update(Request $request, OwnershipType $ownership_type)
    {
        $data = $request->validate([
            'name' =>'required',
        ]);
        
        $update = $ownership_type->update([
            'name' => $data['name'],
        ]);

        if($update){
            return redirect('ownership_types')->with('success','Ownership Type Updated Successfully');
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
        $ownership_type = OwnershipType::findOrFail(decrypt($id));
        $ownership_type->delete();
        return redirect()->back()->with('success','Ownership Type Deleted Successfully');
    }
}
