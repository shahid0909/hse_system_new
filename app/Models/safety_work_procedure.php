<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class safety_work_procedure extends Model
{

    use HasFactory;

    protected $table = "safety_work_procedure";
    protected $fillable = ['id','work_title','before_work_rules','before_work_image',
        'during_work_rules','during_work_image','after_work_rules','after_work_image','potential_hazard','potential_hazard_image',
        'ppe','remarks'];
    protected $primaryKey = "id";
}
