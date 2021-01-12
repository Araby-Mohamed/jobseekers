<?php

namespace App\Model;
use App\Model\Jobs;
use Illuminate\Database\Eloquent\Model;

class Employments extends Model
{
    protected $table = 'employments';

    protected $fillable = ['title', 'image'];

    public function jobs(){
        return $this->hasMany(Jobs::class,'employments_id')->where('accept',1);
    }




}
