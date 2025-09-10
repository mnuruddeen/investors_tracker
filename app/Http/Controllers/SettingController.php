<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $title = "Settings";
        $settings = Setting::all();
        return view('setting.index', compact('title','settings'));
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
            'name' => [
                'required',
                'string',
                'unique:settings,name'
            ]
        ]);

        $create = Setting::create([
            'name' => $request->name
        ]);

        if($create){
            return redirect('settings')->with('success','Setting Added Successfully');
        }else{
            return redirect('settings')->with('error','Something Went Wrong!');
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
    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:settings,name,'.$setting->id
            ]
        ]);

        $update = $setting->update([
            'name'=>$request->name
        ]);
        if($update){
            return redirect()->back()->with('success','Setting Updated Successfully');
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
        $setting = Setting::find(decrypt($id));
        $setting->delete();
        return redirect()->back()->with('success','Setting Deleted Successfully');
    }

    public function toggle(Setting $setting){

        $query = Setting::where('id',$setting->id)->first();
        $status = "";

        if($query->status){
            $status = 0;
        }else{
            $status = 1;
        }

        $setting->update([
            'status'=>$status,
        ]);

        return back()->with('success', "Setting updated successfully");
    }
}
