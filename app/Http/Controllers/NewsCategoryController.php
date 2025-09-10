<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use\App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "News Categories";
        $categories = NewsCategory::all();
        return view('news-category.index', compact('title','categories'));
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
            'category' =>'required|unique:news_categories,name',
        ]);

        $category = NewsCategory::create([
            'name' => $data['category'],
        ]);

        if($category){
            return redirect('categories')->with('success','Category Added Successfully');
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
    public function update(Request $request, NewsCategory $category)
    {
        $data = $request->validate([
            'category' =>'required',
        ]);
        
        $update = $category->update([
            'name' => $data['category'],
        ]);

        if($update){
            return redirect('categories')->with('success','News Category Updated Successfully');
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
        $category = NewsCategory::findOrFail(decrypt($id));
        $category->delete();
        return redirect()->back()->with('success','Category Deleted Successfully');
    }
}
