<?php

namespace App\Model;
use App\Model\ApplyForJobs;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    protected $table = 'jobs';

    protected $fillable = ['years_of_experience','computer','gander','qualification','english_language','microsoft_office','age','other_conditions','basic_salary','Job_type','image','Job_title','employments_id','user_id','job_details','accept'];

    // Get Count Apply Any Job
    public function apply(){
        return $this->hasMany(ApplyForJobs::class,'job_id');
    }




}
