<?php

namespace App\Model;
use App\Model\Cities;
use Illuminate\Database\Eloquent\Model;

class userInfo extends Model
{
    protected $table = 'user_info';

    protected $fillable = ['jop_title','education_levels','Description','facebook','twitter','linkedin','website','city_id','user_id'];

}
