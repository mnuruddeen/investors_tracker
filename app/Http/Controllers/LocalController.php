<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_locals($id){
        echo json_encode(DB::table('locals')->where('state_id', $id)->get());
    }
}
