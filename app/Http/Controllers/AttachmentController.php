<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Attachment;

class AttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            "employee_id" => "required",
            "document_type" => "required",
            "document" => "required",
        ]);
        
        $document = "";
        if(isset($data['document']))
        {
            $document = time()."_document.".request()->document->getClientOriginalExtension();
            request()->document->move('assets/documents', $document);
        }

        $attachment = Attachment::create([
            "employee_id" => decrypt($data['employee_id']),
            "document_type" => $data['document_type'],
            "document" => $document
        ]);

        if($attachment){
            return redirect()->back()->with('success','Attachment has been uploaded successfully');
        }else{
            return redirect()->back()->with('fail','Sorry something went wrong');
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
        $document = Attachment::findOrFail(decrypt($id));
        if($document->document){
            unlink('assets/documents/'.$document->document);
        }
        $document->delete();
        return redirect()->back()->with('success','Attachment Deleted Successfully');
    }
}
