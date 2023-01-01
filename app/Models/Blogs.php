<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    protected $table = 'tbl_blogs';

    public function cat(){

        return $this->hasOne(Category::class,'id','category');
    }
}
