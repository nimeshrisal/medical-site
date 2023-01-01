<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    protected $table = 'tbl_doctor';

    public function service(){

        return $this->belongsTo(Services::class,'department','id');
    }
    
}
