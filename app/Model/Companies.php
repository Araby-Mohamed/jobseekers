<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $table = 'companies';

    protected $fillable = ['title','email_company', 'address', 'logo', 'Description', 'facebook', 'twitter', 'linkedin', 'website', 'city_id', 'employment_id', 'user_id'];


}
