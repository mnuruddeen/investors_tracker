<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Sector;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Products and Services";
        $products = Product::orderBy('id','desc')->get();
        $sectors = Sector::orderBy('sector_name','ASC')->get();
        return view('product.index', compact('title','products','sectors'));
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
            'sector' =>'required',
            'name' =>'required',
        ]);

        $sector = Product::create([
            'sector_id' => $data['sector'],
            'product_name' => $data['name'],
        ]);

        if($sector){
            return redirect('products')->with('success','Product And Services Added Successfully');
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
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'sector' =>'required',
            'name' =>'required',
        ]);

        $update = $product->update([
            'sector_id' => $data['sector'],
            'product_name' => $data['name'],
        ]);

        if($update){
            return redirect('products')->with('success','Product and Services Updated Successfully');
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
        $sector = Product::findOrFail(decrypt($id));
        $sector->delete();
        return redirect()->back()->with('success','Product and Service Deleted Successfully');
    }
}
