<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Local;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function get_lga(Request $request){
        $data = request()->validate([
            'state_id'=>'required',
        ]);
        $locals = Local::whereIn('state_id',$data['state_id'])->orderBy('lga','ASC')->get();
        return response()->json($locals);
    }
}
