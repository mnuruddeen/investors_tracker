<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OwnerType;
use App\Models\OwnershipType;
use App\Models\Certificate;

class CertificateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $certificates = Certificate::orderBy('id','desc')->get();
        $title = "Certificate of Occupancy Database";
        return view('certificate.index', compact('title','certificates'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create Certificate of Occupancy";
        $owner_types = OwnerType::all();
        $ownership_types = OwnershipType::all();
        return view('certificate.create', compact('title','owner_types','ownership_types'));
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
            'date_of_recording' =>'required',
            'owner_type' =>'required',
            'owner_name' =>'required',
            'owner_gender' =>'required',
            'specify' =>'',
            'ownership_type' =>'required',
            'date_of_issuance' =>'required',
            'date_of_registration' =>'required',
            'reference_no' =>'required',
        ]);

        $document = "";
        if(isset($data['document']))
        {
            $document = time()."_certificate.".request()->document->getClientOriginalExtension();
            request()->document->move('main/certificates', $document);
        }


        $certificate = Certificate::create([
            'date_of_recording' => $data['date_of_recording'],
            'owner_type_id' => $data['owner_type'],
            'owner_name' => $data['owner_name'],
            'owner_gender' => $data['owner_gender'],
            'specify' => $data['specify'],
            'ownership_type_id' => $data['ownership_type'],
            'date_of_issuance' => $data['date_of_issuance'],
            'date_of_registration' => $data['date_of_registration'],
            'reference_no' => $data['reference_no'],
            'document' => $document,
            'enumerator_id' => auth()->user()->id,
        ]);

        if($certificate){
            return redirect()->back()->with('success','CofOs Added Successfully');
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

        $CofOs = Certificate::find(decrypt($id));
        $owner_types = OwnerType::all();
        $ownership_types = OwnershipType::all();
        $title = "Edit Certificate of Occupancy";
        return view('certificate.edit', compact('title','CofOs','owner_types','ownership_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificate $certificate)
    {
        $data = $request->validate([
            'document' =>'',
            'date_of_recording' =>'required',
            'owner_type' =>'required',
            'owner_name' =>'required',
            'owner_gender' =>'required',
            'specify' =>'',
            'ownership_type' =>'required',
            'date_of_issuance' =>'required',
            'date_of_registration' =>'required',
            'reference_no' =>'required',
        ]);

        $document = $certificate->document;
        if(isset($data['document']))
        {
            if($certificate->document){
                unlink('main/certificates/'.$certificate->document);
            }
            $document = time()."_news.".request()->document->getClientOriginalExtension();
            request()->document->move('main/certificates', $document);
        }

        $update = $certificate->update([
            'date_of_recording' => $data['date_of_recording'],
            'owner_type_id' => $data['owner_type'],
            'owner_name' => $data['owner_name'],
            'owner_gender' => $data['owner_gender'],
            'specify' => $data['specify'],
            'ownership_type_id' => $data['ownership_type'],
            'date_of_issuance' => $data['date_of_issuance'],
            'date_of_registration' => $data['date_of_registration'],
            'reference_no' => $data['reference_no'],
            'document' => $document,
        ]);

        if($update){
            return redirect()->back()->with('success','CofOs Updated Successfully');
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
        $certificate = Certificate::findOrFail(decrypt($id));
        if($certificate->document){
            unlink('main/certificates/'.$certificate->document);
        }
        $certificate->delete();
        return redirect()->back()->with('success','CofOs Deleted Successfully');
    }
}
