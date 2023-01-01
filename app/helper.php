<?php

use App\Models\Doctors;
use App\Models\Services;
use Illuminate\Support\Facades\DB;

function getDept(){

   $dept = Services::get();

   return $dept;
}

function getDeptWiseDoc($id){

   $doc = Doctors::where('department',$id)->get()->toArray();

   return $doc;
}