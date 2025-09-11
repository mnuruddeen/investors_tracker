<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
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

        return view('home',compact('title',));
    }
}
