<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function owner_type(){
        return $this->belongsTo(OwnerType::class,'owner_type_id','id');
    }

    public function ownership_type(){
        return $this->belongsTo(OwnershipType::class,'ownership_type_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'enumerator_id','id');
    }
}
