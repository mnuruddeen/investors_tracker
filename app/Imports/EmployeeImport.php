<?php

namespace App\Imports;

use App\Models\DuplicateEmployee;
use App\Models\Employee;
use App\Models\Local;
use App\Models\State;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

//HeadingRowFormatter::default('none');

class EmployeeImport implements ToModel, WithHeadingRow

{

    private $mda_id;
    public function __construct($mda_id)
    {
        $this->mda_id = $mda_id;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //dd($row);
        $grade_level = explode('-',$row['gl']);
        //$step = explode(' ',$row['step']);
        $grade_level_at_entry = explode('.',$row['gl_at_entry_point']);
        $state_name = explode('-',$row['state_of_origin']);
        $local_name = explode('-',$row['lga_of_origin']);
        if(count($local_name)>1){
            $lga = $local_name[1];
        }else{
            $lga = $local_name[0];
        }
        $bank_name = explode('-',$row['bank_name']);
        $state = State::where('state','LIKE','%'.$state_name[0].'%')->first();
        $local = Local::where('lga','LIKE','%'.$lga.'%')->first();
        if($state){
            $state_id = $state->id;
        }else{
            /* altered */
            if($local){
                $state_id = $local->state_id;
            }else{
                $state_id = '';
            }
            /*end altered*/
        }
        if($local){
            $local_id = $local->id;
        }else{
           $local_id = '';
        }
        if(count($grade_level_at_entry)>1){
            $gl_at_entry = $grade_level_at_entry[1];
        }else{
            $gl = explode(' ',$grade_level_at_entry[0]);
            if(count($gl)>1){
                $gl_at_entry = $gl[1];
            }else{
                $gl_at_entry = "";
            }
        }
        /*if(count($step)>1){
            $stp = $step[1];
        }else{
            $st = explode('-',$step[0]);
            $stp = $st[2];
        }*/
        if(count($bank_name)>1){
            $bank = $bank_name[1];
        }else{
            $bank = $bank_name[0];
        }
        $emp = Employee::where('psn','=',$row['psn'])->first();
        if(!$emp){
        return new Employee([
            "full_name" => $row['fullname'],
            "first_name" => $row['firstname'],
            "middle_name" => $row['middlename'],
            "last_name" => $row['lastname'],
            "email" => $row['e_mail_address_if_any'],
            "gender" => $row['gender'],
            "dob" => convert_import_date($row['dob']),
            "address" => $row['home_address'],
            "present_qualification" => $row['present_qualification'],
            "qualification_at_entry" => $row['qualification_at_entry_point'],
            "state_id" => $state_id,
            "local_id" => $local_id,
            "nin" => $row['nin'],
            "mda_id" => $this->mda_id,
            "psn" => trim($row['psn']),
            "cadre2" => $row['cadre'],
            "rank2" => $row['rank'],
            "grade_level" => $grade_level[0],
            "grade_level_at_entry" => $gl_at_entry,
            "step" => trim($row['step']),
            "dofa" => convert_import_date($row['dofa']),
            "dopa" => convert_import_date($row['dopa']),
            "station" => $row['station'],
            "location" => $row['station'],
            "bank_name" => $bank,
            "account_no" => $row['accountno'],
            "bvn" => $row['bvn'],
            "phone" => $row['bank_alert_phoneno'],
            "disability" => $row['disability_if_any'],
            "status" => 1,
        ]);
        }else{
            DuplicateEmployee::create([
                "full_name" => $row['fullname'],
                "first_name" => $row['firstname'],
                "middle_name" => $row['middlename'],
                "last_name" => $row['lastname'],
                "email" => $row['e_mail_address_if_any'],
                "gender" => $row['gender'],
                "dob" => convert_import_date(ltrim($row['dob'])),
                "address" => $row['home_address'],
                "present_qualification" => $row['present_qualification'],
                "qualification_at_entry" => $row['qualification_at_entry_point'],
                "state_id" => $state_id,
                "local_id" => $local_id,
                "nin" => $row['nin'],
                "mda_id" => $this->mda_id,
                "found_mda_id" => $emp->mda_id,
                "psn" => $row['psn'],
                "cadre" => $row['cadre'],
                "rank" => $row['rank'],
                "grade_level" => $grade_level[0],
                "grade_level_at_entry" => $gl_at_entry,
                "step" => $row['step'],
                "dofa" => convert_import_date(ltrim($row['dofa'])),
                "dopa" => convert_import_date(ltrim($row['dopa'])),
                "station" => $row['station'],
                "location" => $row['station'],
                "bank_name" => $bank,
                "account_no" => $row['accountno'],
                "bvn" => $row['bvn'],
                "phone" => $row['bank_alert_phoneno'],
                "disability" => $row['disability_if_any'],
                "status" => 1,
            ]);
            return new Employee([
                "full_name" => $row['fullname'],
                "first_name" => $row['firstname'],
                "middle_name" => $row['middlename'],
                "last_name" => $row['lastname'],
                "email" => $row['e_mail_address_if_any'],
                "gender" => $row['gender'],
                "dob" => convert_import_date($row['dob']),
                "address" => $row['home_address'],
                "present_qualification" => $row['present_qualification'],
                "qualification_at_entry" => $row['qualification_at_entry_point'],
                "state_id" => $state_id,
                "local_id" => $local_id,
                "nin" => $row['nin'],
                "mda_id" => $this->mda_id,
                "psn" => $row['psn'],
                "cadre2" => $row['cadre'],
                "rank2" => $row['rank'],
                "grade_level" => $grade_level[0],
                "grade_level_at_entry" => $gl_at_entry,
                "step" => $row['step'],
                "dofa" => convert_import_date($row['dofa']),
                "dopa" => convert_import_date($row['dopa']),
                "station" => $row['station'],
                "location" => $row['station'],
                "bank_name" => $bank,
                "account_no" => $row['accountno'],
                "bvn" => $row['bvn'],
                "phone" => $row['bank_alert_phoneno'],
                "disability" => $row['disability_if_any'],
                "status" => 1,
            ]);
        }

    }
}
