<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $title = "Galleries";
        $galleries = Gallery::orderBy('id','desc')->get();;
        return view('gallery.index', compact('title','galleries'));
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
            'caption' =>'',
        ]);
        $document = "";
        if(isset($data['document']))
        {
            $document = time()."_gallery.".request()->document->getClientOriginalExtension();
            request()->document->move('main/img/galleries', $document);
        }

        $gallery = Gallery::create([
            'caption' => $data['caption'],
            'image' => $document,
        ]);

        if($gallery){
            return redirect('galleries')->with('success','Image Added Successfully');
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
    public function update(Request $request, Gallery $gallery)
    {
        $data = $request->validate([
            'document' =>'required',
            'caption' =>'',
        ]);
        $document = $gallery->image;
        if(isset($data['document']))
        {
            if($gallery->image){
                unlink('main/img/galleries/'.$gallery->image);
            }
            $document = time()."_gallery.".request()->document->getClientOriginalExtension();
            request()->document->move('main/img/galleries', $document);
        }

        $update = $gallery->update([
            'caption' => $data['caption'],
            'image' => $document,
        ]);

        if($update){
            return redirect('galleries')->with('success','Image Updated Successfully');
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
        $gallery = Gallery::findOrFail(decrypt($id));
        if($gallery->image){
            unlink('main/img/galleries/'.$gallery->image);
        }
        $gallery->delete();
        return redirect()->back()->with('success','Image Deleted Successfully');
    }
}
