<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CaseCategory;
use App\Models\CaseFile;
use App\Models\CaseDocument;


class CaseFileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view case',['only'=>['index']]);
        $this->middleware('permission:create case',['only'=>['create','store']]);
        $this->middleware('permission:update case',['only'=>['edit','update']]);
        $this->middleware('permission:delete case',['only'=>['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Cases File";
        $cases = CaseFile::all();
        return view('case.index', compact('title','cases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Upload New Cases";
        $categories = CaseCategory::where('status',1)->get();
        return view('case.create', compact('title','categories'));
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
            'category' =>'required',
            'title' =>'required',
            'case_date' =>'required',
            'description' =>'required',
        ]);

        $category = CaseFile::create([
            'category_id' => $data['category'],
            'title' => $data['title'],
            'case_date' => $data['case_date'],
            'description' => $data['description'],
            'uploaded_by' => auth()->user()->id,
        ]);

        if($category){
            return redirect('cases')->with('success','Case Uploaded Successfully');
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
        $case = CaseFile::findOrFail(decrypt($id));
        $documents = CaseDocument::where('case_id',$case->id)->get();
        $title = $case->title;
        
        return view('case.show',compact('title','case','documents'));

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

    public function ongoing_cases()
    {
        $title = "Ongoing Cases";
        $cases = CaseFile::where('status',0)->get();
        return view('case.ongoing', compact('title','cases'));
    }

    public function treated_cases()
    {
        $title = "Treated Cases";
        $cases = CaseFile::where('status',1)->get();
        return view('case.treated', compact('title','cases'));
    }
}
