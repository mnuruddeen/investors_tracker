<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Attachment;
use App\Models\Bank;
use App\Models\Cadre;
use App\Models\Rank;
use App\Models\State;
use App\Models\NatureOfEmployment;
use DateTime;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Employees";
        $cadres = Cadre::all();
        $banks = Bank::all();
        $states = State::all();
        $natures = NatureOfEmployment::all();
        $employees = Employee::all();
        return view('employee.index',compact('title','cadres','states','employees','natures','banks'));
    }

    public function store(Request $request){
        $data = $request->validate([
            "first_name" => "required",
            "middle_name" => '',
            "last_name" => "required",
            "email" => "required",
            "marital_status" => "required",
            "gender" => "required",
            "dob" => "required",
            "address" => "required",
            "nationality" => "required",
            "state" => "required",
            "lga" => "required",
            "nin" => '',
            "psn" => "required",
            "cadre" => "required",
            "rank" => "required",
            "grade_level" => "required",
            "step" => "required",
            "dofa" => "required",
            "duty_station" => "required",
            "nature" => "required",
            "disability" => "required",
            "bank_name" => "required",
            "account_no" => "required",
            "bvn" => "required",
            "phone" => "required",
            "image" => "",
        ]);
        $rank = Rank::find($data['rank']);
        $document = "";
        if(isset($data['image']))
        {
            $document = time()."_passport.".request()->image->getClientOriginalExtension();
            request()->image->move('assets/img/passports', $document);
        }

        $employee = Employee::create([
            "full_name" => $data['first_name']." ".$data['middle_name']." ".$data['last_name'],
            "first_name" => $data['first_name'],
            "middle_name" => $data['middle_name'],
            "last_name" => $data['last_name'],
            "email" => $data['email'],
            "marital_status" => $data['marital_status'],
            "gender" => $data['gender'],
            "dob" => $data['dob'],
            "address" => $data['address'],
            "nationality" => $data['nationality'],
            "state_id" => $data['state'],
            "local_id" => $data['lga'],
            "nin" => $data['nin'],
            "psn" => $data['psn'],
            "cadre_id" => $data['cadre'],
            "rank_id" => $data['rank'],
            "grade_level" => $rank->grade_level,
            "step" => $data['step'],
            "dofa" => $data['dofa'],
            "dopa" => $data['dofa'],
            "station" => $data['duty_station'],
            "employment_type" => $data['nature'],
            "disability" => $data['disability'],
            "bank_id" => $data['bank_name'],
            "bank_name" => $data['bank_name'],
            "account_no" => $data['account_no'],
            "bvn" => $data['bvn'],
            "phone" => $data['phone'],
            "passport" => $document
        ]);

        if($employee){
            return redirect()->back()->with('success','Employee has been added successfully');
        }else{
            return redirect()->back()->with('fail','Sorry something went wrong');
        }
    }

    public function show($id)
    {
        $e = Employee::findOrFail(decrypt($id));
        $documents = Attachment::where('employee_id',$e->id)->get();
        $title = $e->full_name;
        $natures = NatureOfEmployment::all();
        $cadres = Cadre::all();
        $banks = Bank::all();
        $states = State::all();
        
        return view('employee.show',compact('title','e','cadres','states','natures','banks','documents'));

    }

}
