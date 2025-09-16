<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use App\Models\InvestmentLocation;
use App\Models\InvestmentProduct;
use App\Models\Local;
use App\Models\Product;
use App\Models\Sector;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvestmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Investments";
        if(auth()->user()->is_admin){
            $investments = Investment::orderBy('id','desc')->get();
        }else{
            $investments = Investment::orderBy('id','desc')->where('user_id',auth()->user()->id)->get();
        }
        $states = State::orderBy('state','ASC')->get();
        $sectors = Sector::orderBy('sector_name','ASC')->get();
        return view('investment.index', compact('title','investments','states','sectors'));
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
            'reg_no' =>'',
            'export_reg_no' =>'',
            'name' =>'',
            'description' =>'',
            'address' =>'',
            'email' =>'',
            'phone' =>'',
            'focal_person' =>'',
            'job_created' =>'',
            'lga' =>'',
            'product' =>'',
            'investment_value' =>'',
        ]);
        $investment = Investment::create([
            'user_id' => \auth()->user()->id,
            'investment_name' => $data['name'],
            'description' => $data['description'],
            'reg_no' => $data['reg_no'],
            'export_reg_no' => $data['export_reg_no'],
            'address' => $data['address'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'focal_person' => $data['focal_person'],
            'job_created' => $data['job_created'],
            'investment_value' => $data['investment_value'],
        ]);

        if($investment){
            $locations = [];
            $products = [];
            foreach ($data['lga'] as $p){
                $row = [];
                $row['investment_id'] = $investment->id;
                $row['local_id'] = $p;
                $row['created_at'] = date('Y-m-d h:i:s');
                $row['updated_at'] = date('Y-m-d h:i:s');
                $locations[] = $row;
            }
            foreach ($data['product'] as $p){
                $row = [];
                $row['investment_id'] = $investment->id;
                $row['product_id'] = $p;
                $row['created_at'] = date('Y-m-d h:i:s');
                $row['updated_at'] = date('Y-m-d h:i:s');
                $products[] = $row;
            }
            InvestmentLocation::insert($locations);
            InvestmentProduct::insert($products);
            return redirect('investments')->with('success','Investment Added Successfully');
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
        $investment = Investment::find(decrypt($id));
        $title = $investment->investment_name;
        return view('investment.show', compact('title','investment'));

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
    public function update(Request $request, Investment $investment)
    {
        $data = $request->validate([
            'reg_no' =>'',
            'export_reg_no' =>'',
            'name' =>'required',
            'description' =>'',
            'address' =>'',
            'email' =>'',
            'phone' =>'',
            'focal_person' =>'',
            'job_created' =>'',
            'lga' =>'',
            'product' =>'',
            'investment_value' =>'',
        ]);
        $update = $investment->update([
            'investment_name' => $data['name'],
            'description' => $data['description'],
            'reg_no' => $data['reg_no'],
            'address' => $data['address'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'focal_person' => $data['focal_person'],
            'job_created' => $data['job_created'],
            'investment_value' => $data['investment_value'],
        ]);

        if($update){
            $l = InvestmentLocation::where('investment_id','=',$investment->id)->delete();
            $p = InvestmentProduct::where('investment_id','=',$investment->id)->delete();
            $locations = [];
            $products = [];
            foreach ($data['lga'] as $p){
                $row = [];
                $row['investment_id'] = $investment->id;
                $row['local_id'] = $p;
                $row['created_at'] = date('Y-m-d h:i:s');
                $row['updated_at'] = date('Y-m-d h:i:s');
                $locations[] = $row;
            }
            foreach ($data['product'] as $p){
                $row = [];
                $row['investment_id'] = $investment->id;
                $row['product_id'] = $p;
                $row['created_at'] = date('Y-m-d h:i:s');
                $row['updated_at'] = date('Y-m-d h:i:s');
                $products[] = $row;
            }
            InvestmentLocation::insert($locations);
            InvestmentProduct::insert($products);
            return redirect('investments')->with('success','Service Updated Successfully');
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
        $investment = Investment::findOrFail(decrypt($id));
        $investment->delete();
        return redirect()->back()->with('success','Investment Deleted Successfully');
    }
    public function get_product(Request $request){
        $data = request()->validate([
            'sector_id'=>'required',
        ]);
        $locals = Product::whereIn('sector_id',$data['sector_id'])->orderBy('product_name','ASC')->get();
        return response()->json($locals);
    }
}
