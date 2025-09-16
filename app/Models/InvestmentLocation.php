<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestmentLocation extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function investment(){
        return $this->belongsTo(Investment::class);
    }
    public function local(){
        return $this->belongsTo(Local::class);
    }
}
