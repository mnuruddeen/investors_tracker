<?php

use App\Models\Employee;
use App\Models\Rank;
use Carbon\Carbon;

function convert_date($date_string){
    $date = DateTime::createFromFormat('d/m/Y', $date_string);
    $formattedDate = $date->format('Y-m-d');
    return $formattedDate;
}

function convert_import_date($date_string){
    $date = Carbon::parse($date_string);
    $formattedDate = $date->format('Y-m-d');
    return $formattedDate;
}

function calculateAge($date)
{
    // Convert the date of birth to a Carbon instance
    $date = Carbon::parse($date);
    // Get the current date
    $now = Carbon::now();
    // Calculate the difference in years
    $age = $date->diffInYears($now);
    return $age;
}

function getDateString($date,$years){
    try{
        $date = Carbon::parse($date);
        $expected_date = $date->addYears($years);
        return $expected_date->format('Y-m-d');
    }catch (Exception $e){
        return $e->getMessage();
    }
}
function calculateEDOR($employee)
{
    //check employee MDA category
    if($employee->mda->mda_category == 2){
        return getDateString($employee->dob,65);
    }else{
        //get remaining years in service
        $remaining_years_by_dob = 60 - calculateAge($employee->dob);
        $remaining_years_by_dofa = 35 - calculateAge($employee->dofa);
        if($remaining_years_by_dofa < $remaining_years_by_dob){
            return getDateString($employee->dofa,35);
        }elseif ($remaining_years_by_dob < $remaining_years_by_dofa){
            return getDateString($employee->dob,60);
        }else{
            //in case of all are same months should judge
            $month_dob = date('m',strtotime($employee->dob));
            $month_dofa = date('m',strtotime($employee->dofa));
            if($month_dofa < $month_dob){
                return getDateString($employee->dofa,35);
            }elseif ($month_dob < $month_dofa){
                return getDateString($employee->dob,60);
            }
        }
    }
}
