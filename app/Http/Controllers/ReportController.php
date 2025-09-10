<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function employees()
    {
        $title = "List of Employees";
        $employees = Employee::all()->sortBy('first_name');
        return view('report.employee',compact('title','employees'));
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
