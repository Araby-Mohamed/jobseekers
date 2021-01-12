<?php

namespace App\Model;
use App\Model\Cities;
use Illuminate\Database\Eloquent\Model;

class ApplyForJobs extends Model
{
    protected $table = 'apply_for_jobs';

    protected $fillable = ['job_id','user_id'];

    public function city_id(){
        return $this->hasOne(Cities::class,'id','city_id');
    }

    // Get Count Apply Any Job
//    public function apply(){
//        return $this->hasMany(Jobs::class,'id');
//    }

    // Get Count Apply Any Job
    public function apply(){
        return $this->hasMany(ApplyForJobs::class,'job_id');
    }
}
