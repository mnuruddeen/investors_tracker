<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $title = "Sliders";
        $sliders = Slider::all();
        return view('slider.index', compact('title','sliders'));
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
            'slider' =>'required',
            'title_1' =>'required',
            'title_2' =>'',
            'title_3' =>'',
        ]);
        $slider = "";
        if(isset($data['slider']))
        {
            $slider = time()."_slider.".request()->slider->getClientOriginalExtension();
            request()->slider->move('main/img/slides', $slider);
        }

        $slide = Slider::create([
            'title_1' => $data['title_1'],
            'title_2' => $data['title_2'],
            'title_3' => $data['title_3'],
            'image' => $slider,
        ]);

        if($slide){
            return redirect('sliders')->with('success','Slider Uploaded Successfully');
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
    public function update(Request $request, Slider $slider)
    {
        $data = $request->validate([
            'slider' =>'',
            'title_1' =>'required',
            'title_2' =>'',
            'title_3' =>'',
        ]);
        $document = $slider->image;
        if(isset($data['slider']))
        {   
            unlink('main/img/slides/'.$document);
            $document = time()."_slider.".request()->slider->getClientOriginalExtension();
            request()->slider->move('main/img/slides', $document);
        }

        $slide = $slider->update([
            'title_1' => $data['title_1'],
            'title_2' => $data['title_2'],
            'title_3' => $data['title_3'],
            'image' => $document,
        ]);

        if($slide){
            return redirect('sliders')->with('success','Slider Updated Successfully');
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
        $slider = Slider::findOrFail(decrypt($id));
        unlink('main/img/slides/'.$slider->image);
        $slider->delete();
        return redirect()->back()->with('success','Slider Deleted Successfully');
    }
}
