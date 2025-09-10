<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $title = "Services";
        $services = Service::orderBy('id','desc')->get();;
        return view('service.index', compact('title','services'));
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
            'name' =>'required',
            'description' =>'required',
        ]);
        $document = "";
        if(isset($data['document']))
        {
            $document = time()."_service.".request()->document->getClientOriginalExtension();
            request()->document->move('main/img/services', $document);
        }

        $service = Service::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'image' => $document,
        ]);

        if($service){
            return redirect('services')->with('success','Service Added Successfully');
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
    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'document' =>'',
            'name' =>'required',
            'description' =>'required',
        ]);
        $document = $service->image;
        if(isset($data['document']))
        {
            if($service->image){
                unlink('main/img/services/'.$service->image);
            }
            $document = time()."_service.".request()->document->getClientOriginalExtension();
            request()->document->move('main/img/services', $document);
        }

        $update = $service->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'image' => $document,
        ]);

        if($update){
            return redirect('services')->with('success','Service Updated Successfully');
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
        $service = Service::findOrFail(decrypt($id));
        if($service->image){
            unlink('main/img/services/'.$service->image);
        }
        $service->delete();
        return redirect()->back()->with('success','Service Deleted Successfully');
    }
}
