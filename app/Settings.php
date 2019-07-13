<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'name', 'slogen', 'phone', 'mobile', 'email', 'address', 'owner_name', 'image', 'theme'
    ];
}
