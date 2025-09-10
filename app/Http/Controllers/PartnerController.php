<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $title = "Partners";
        $partners = Partner::all();
        return view('partner.index', compact('title','partners'));
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
            'name' =>'required|unique:partners,name',
            'abbreviation' =>'required',
            'website' =>'',
        ]);
        $document = "";
        if(isset($data['document']))
        {
            $document = time()."_partner.".request()->document->getClientOriginalExtension();
            request()->document->move('main/img/partners', $document);
        }

        $slide = Partner::create([
            'name' => $data['name'],
            'abr' => $data['abbreviation'],
            'website' => $data['website'],
            'logo' => $document,
        ]);

        if($slide){
            return redirect('partners')->with('success','Partner Added Successfully');
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
    public function update(Request $request, Partner $partner)
    {
        $data = $request->validate([
            'document' =>'',
            'name' => ['required', 'unique:partners,name,'.$partner->id],
            'abbreviation' =>'required',
            'website' =>'',
        ]);
        
        $document = $partner->logo;
        if(isset($data['document']))
        {
            if($partner->logo){
                unlink('main/img/partners/'.$partner->logo);
            }
            $document = time()."_partner.".request()->document->getClientOriginalExtension();
            request()->document->move('main/img/partners', $document);
        }

        $update = $partner->update([
            'name' => $data['name'],
            'abr' => $data['abbreviation'],
            'website' => $data['website'],
            'logo' => $document,
        ]);

        if($update){
            return redirect('partners')->with('success','Partner Updated Successfully');
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
        $partner = Partner::findOrFail(decrypt($id));
        if($partner->logo){
            unlink('main/img/partners/'.$partner->logo);
        }
        $partner->delete();
        return redirect()->back()->with('success','Partner Deleted Successfully');
    }
}
