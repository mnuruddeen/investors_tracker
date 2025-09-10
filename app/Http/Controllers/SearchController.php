<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Certificate;

class SearchController extends Controller
{
    public function search_results(Request $request){

        $data = $request->validate([
            "q" => "required",

        ]);

        //dd($data);
        $q = $data['q'];
        $results = Certificate::where('owner_name','like', "%$q%")->orWhere('reference_no','like', "%$q%")->orderBy('owner_name','asc')->get();
        $total_results = $results->count();
        $title = "($total_results) Search Results: " .strtoupper($q);
        return view('search.search_result',compact('title','results'));
    }
}
