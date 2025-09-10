<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CaseCategory;
use Illuminate\Http\Request;

class CaseCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view case category',['only'=>['index']]);
        $this->middleware('permission:create case category',['only'=>['create','store']]);
        $this->middleware('permission:update case category',['only'=>['edit','update']]);
        $this->middleware('permission:delete case category',['only'=>['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Cases Categories";
        $categories = CaseCategory::all();
        return view('case_category.index', compact('title','categories'));
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
            'category' => [
                'required',
                'string',
                'unique:case_categories,name'
            ]
        ]);

        $create = CaseCategory::create([
            'name' => $request->category
        ]);

        if($create){
            return redirect('case-categories')->with('success','Category Added Successfully');
        }else{
            return redirect('case-categories')->with('error','Something Went Wrong!');
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

    public function update(Request $request, CaseCategory $category)
    {
        $data = $request->validate([
            'category' =>'required',
        ]);
        
        $update = $category->update([
            'name' => $data['category'],
        ]);

        if($update){
            return redirect('case-categories')->with('success','Category Updated Successfully');
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
        $category = CaseCategory::find(decrypt($id));
        $category->delete();
        return redirect()->back()->with('success','Category Deleted Successfully');
    }
}
