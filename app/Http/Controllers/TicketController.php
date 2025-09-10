<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketCategory;
use App\Models\User;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $title = "Ticket";
        $categories = TicketCategory::all();
        return view('ticket-category.index', compact('title','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create Ticket";
        $categories = TicketCategory::all();
        return view('ticket.create', compact('title','categories'));
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
            'name' =>'required',
            'email' =>'required',
            'category' =>'required',
            'priority' =>'required',
            'subject' =>'required',
            'description' =>'required',
            'attachment' =>'',
            'address' =>'required',
            'nature_of_business' =>'required',
            'phone' =>'required',
            'nin' =>'required',
        ]);
        $user = User::where('email',$data['email'])->first();
        $document = [];
        $ticket_no = $this->generateTicketNumber();
        if(isset($data['attachment']))
        {
            if(count($data['attachment'])>0){
                for($i=0; $i<count($data['attachment']); $i++){
                    $file_name = uniqid('ticket').time()."_".$ticket_no.'_'.$i.'.'.request()->attachment[$i]->getClientOriginalExtension();
                    request()->attachment[$i]->move('attachment', $file_name);
                    $document[] = $file_name;
                }
            }

        }
        if(!$user){
            $user = User::create([
               'name'=>$data['name'],
               'email'=>$data['email'],
               'is_admin'=>0,
               'password'=>bcrypt("password")
            ]);
        }

        $category = Ticket::create([
            'user_id' => $user->id,
            'ticket_category_id' => $data['category'],
            'ticket_no' => $ticket_no,
            'priority' => $data['priority'],
            'subject' => $data['subject'],
            'description' => $data['description'],
            'address' => $data['address'],
            'nature_of_business' => $data['nature_of_business'],
            'phone' => $data['phone'],
            'nin' => $data['nin'],
            'document' => implode(',',$document),
        ]);

        if($category){
            return redirect('tickets/create')->with('success','Ticket Has Been Successfully Submitted with Ticket No:'.$ticket_no);
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
    public function update(Request $request, TicketCategory $category)
    {
        $data = $request->validate([
            'category' =>'required',
        ]);

        $update = $category->update([
            'name' => $data['category'],
        ]);

        if($update){
            return redirect('ticket-categories')->with('success','News Category Updated Successfully');
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
        $category = TicketCategory::findOrFail(decrypt($id));
        $category->delete();
        return redirect()->back()->with('success','Category Deleted Successfully');
    }

    public function generateTicketNumber() {
        // Generate a random string using random_bytes
        $randomPart = bin2hex(random_bytes(5)); // 10 hex characters = 20 digits
        $timestampPart = substr(time(), -5); // Last 5 digits of the Unix timestamp
        $referenceNumber = substr($randomPart . $timestampPart, 0, 10);
        return strtoupper($referenceNumber);
    }
}
