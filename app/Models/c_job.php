<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\hazard;
use App\Models\I_hirarc;


class c_job extends Model
{
    use HasFactory;
    protected $guarded = [''];


   // public function hezardDetails()
   // {
   //  return $this->hasMany(hazard::class,'job_activity_id','id');
   // }

   // public function  hirarcdetails(){
   //  return $this->belongsTo(I_hirarc::class,'hirarc_id','id');
   // }
   
}
