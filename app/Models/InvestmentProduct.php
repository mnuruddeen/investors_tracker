<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class InvestmentProduct extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function investment(){
        return $this->belongsTo(Investment::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
