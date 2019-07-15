<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HumanResources extends Model
{
    protected $table = 'human_resources';

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'mobile', 'job', 'birth_date', 'gender', 'image', 'address', 'status'
    ];
}   
