<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = ['site_name', 'logo', 'favicon', 'email', 'phone', 'address', 'keywords', 'description'];

}
