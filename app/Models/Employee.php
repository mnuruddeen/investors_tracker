<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cadre(){
        return $this->belongsTo(Cadre::class);
    }
    public function rank(){
        return $this->belongsTo(Rank::class);
    }
    public function state(){
        return $this->belongsTo(State::class);
    }
    public function local(){
        return $this->belongsTo(Local::class);
    }
    public function get_location(){
        return $this->belongsTo(Local::class,'location','id');
    }
    public function nature(){
        return $this->belongsTo(NatureOfEmployment::class,'employment_type','id');
    }
    public function bank(){
        return $this->belongsTo(Bank::class);
    }
}
