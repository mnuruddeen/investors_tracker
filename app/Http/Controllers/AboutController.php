<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $title = "Abouts";
        $abouts = About::all();
        return view('about.index', compact('title','abouts'));
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
            'document' =>'',
            'name' =>'required|unique:abouts,name',
            'title' =>'required',
            'description' =>'required',
        ]);
        $document = "";
        if(isset($data['document']))
        {
            $document = time()."_about.".request()->document->getClientOriginalExtension();
            request()->document->move('main/img/abouts', $document);
        }

        $slide = About::create([
            'name' => $data['name'],
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $document,
        ]);

        if($slide){
            return redirect('abouts')->with('success','About Uploaded Successfully');
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
    public function update(Request $request, About $about)
    {
        $data = $request->validate([
            'document' =>'',
            'name' => ['required', 'unique:abouts,name,'.$about->id],
            'title' =>'required',
            'description' =>'required',
        ]);
        $document = $about->image;
        if(isset($data['document']))
        {
            if($about->image){
                unlink('main/img/abouts/'.$about->image);
            }
            $document = time()."_about.".request()->document->getClientOriginalExtension();
            request()->document->move('main/img/abouts', $document);
        }

        $update = $about->update([
            'name' => $data['name'],
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $document,
        ]);

        if($update){
            return redirect('abouts')->with('success','About Updated Successfully');
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
        $about = About::findOrFail(decrypt($id));
        if($about->image){
            unlink('main/img/abouts/'.$about->image);
        }
        $about->delete();
        return redirect()->back()->with('success','About Deleted Successfully');
    }
}
