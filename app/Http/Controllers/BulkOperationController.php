<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Imports\EmployeeImport;
use App\Models\Cadre;
use App\Models\Mda;
//use avadim\FastExcelReader\Excel;
use App\Models\Rank;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Rap2hpoutre\FastExcel\FastExcel;


class BulkOperationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:import nominal roll',['only'=>['import_nominal_roll']]);
    }

    public function import_nominal_roll()
    {
        $title = "Import Nominal Roll";
        $mdas = Mda::all();
        return view('import.nominal_roll',compact('title','mdas'));
    }

    public function store_nominal_roll(Request $request)
    {
        $data = $request->validate([
            'mda' =>'required',
            'nominal_roll' =>'required',
        ]);
        Excel::import(new EmployeeImport($data['mda']), request()->file('nominal_roll'));

        return redirect()->back()->with('success','Records successfully imported');

        /*//Fast excel library
        $employees = (new FastExcel)->import(request()->file('nominal_roll'), function ($line) use($data) {
            dd($line);
            $level ='';
            $semester ='';
            $level = $data['class'];
            $semester = $data['semester'];
            return Result::create([
                'reg_no'=>$line['RegNo'],
                'course_registration_id'=>$line['CourseRegistration'],
                'semester'=>$data['semester'],
                'ca'=>$line['CA'],
                'exam'=>$line['Exam'],
            ]);
        });*/
        /*//avadim excel library
        $file = request()->file('nominal_roll');
        $excel = Excel::open($file);
        $result = $excel->readRows();
        dd($result);*/
    }
    public function fix(){
        $cadres = Cadre::all();
        foreach ($cadres as $c){
            $ranks = Rank::where('cadre_id','=',$c->id)->get();
            foreach ($ranks as $r){
                if($r->grade_level == 16){
                    $ra = Rank::find($r->id);
                    $nr = Rank::where('cadre_id','=',$c->id)->where('grade_level','=',17)->first();
                    if($nr){
                        $ra->update([
                            'rank'=>$nr->rank
                        ]);
                    }
                }
            }
        }
    }

}
