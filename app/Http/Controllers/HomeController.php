<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Investment;
use App\Models\InvestmentLocation;
use App\Models\OwnershipType;
use App\Models\OwnerType;
use Illuminate\Http\Request;
use App\Models\Employee;
use DateTime;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = "Dashboard";
        if(auth()->user()->is_admin){
            $investments = Investment::all();
            $lgas = InvestmentLocation::get()->unique('local_id');
            $chart_data = [];
            foreach ($lgas as $l){
                $inv = Investment::whereHas('location',function ($q)use($l){
                    $q->where('local_id','=',$l->local_id);
                })->get();
                $chart_data[$l->local->lga] = $inv->sum('investment_value');
            }
        }else{
            $investments = Investment::all()->where('user_id',auth()->user()->id);
            $lgas = InvestmentLocation::get()->unique('local_id');
            $chart_data = [];
            foreach ($lgas as $l){
                $inv = Investment::whereHas('location',function ($q)use($l){
                    $q->where('local_id','=',$l->local_id);
                })->get();
                $chart_data[$l->local->lga] = $inv->sum('investment_value');
            }
        }

        return view('home',compact('title','investments','chart_data'));
    }
}
