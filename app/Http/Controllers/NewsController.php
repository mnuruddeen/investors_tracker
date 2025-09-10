<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $news = News::orderBy('id','desc')->get();
        $title = "News";
        return view('news.index', compact('title','news'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create News";
        $categories = NewsCategory::all();
        return view('news.create', compact('title','categories'));
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
            'title' =>'required|unique:news,title',
            'body' =>'required',
            'category' =>'required',
        ]);
        $document = "";
        if(isset($data['document']))
        {
            $document = time()."_news.".request()->document->getClientOriginalExtension();
            request()->document->move('main/img/news', $document);
        }

        $news = News::create([
            'title' => $data['title'],
            'body' => $data['body'],
            'category_id' => $data['category'],
            'cover_img' => $document,
        ]);

        if($news){
            return redirect('news')->with('success','News Added Successfully');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $news = News::find(decrypt($id));
        $categories = NewsCategory::all();
        $title = "Edit News";
        return view('news.edit', compact('title','news','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'document' =>'',
            'title' => ['required', 'unique:news,title,'.$news->id], 
            'body' =>'required',
            'category' =>'required',
        ]);

        $document = $news->cover_img;
        if(isset($data['document']))
        {
            if($news->cover_img){
                unlink('main/img/news/'.$news->cover_img);
            }
            $document = time()."_news.".request()->document->getClientOriginalExtension();
            request()->document->move('main/img/news', $document);
        }

        $update = $news->update([
            'title' => $data['title'],
            'body' => $data['body'],
            'category_id' => $data['category'],
            'cover_img' => $document,
        ]);

        if($update){
            return redirect('news')->with('success','News Updated Successfully');
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
        $news = News::findOrFail(decrypt($id));
        if($news->cover_img){
            unlink('main/img/news/'.$news->cover_img);
        }
        $news->delete();
        return redirect()->back()->with('success','News Deleted Successfully');
    }
}
