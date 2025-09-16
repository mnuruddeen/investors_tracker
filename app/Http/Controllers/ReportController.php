<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use Illuminate\Http\Request;
use App\Models\Employee;

class ReportController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function investment()
    {
        $title = "List Of Investments Registered With The State";
        $investments = Investment::all()->sortBy('investment_name');
        return view('report.investment',compact('title','investments'));
    }

    public function bank_details()
    {
        $title = "Employees Bank Details";
        $employees = Employee::all()->sortBy('first_name');
        return view('report.bank_detail',compact('title','employees'));
    }

    public function contact_details()
    {
        $title = "Employees Contact Details";
        $employees = Employee::all()->sortBy('first_name');
        return view('report.contact_detail',compact('title','employees'));
    }

}
