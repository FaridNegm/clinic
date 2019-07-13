<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorAppointments extends Model
{

    protected $table = 'doctor_appointment';

    protected $fillable = [
        'name', 'sat', 'sun', 'mon', 'tue', 'wen', 'thu', 'fri', 'sat_from', 'sat_to',  'sun_from', 'sun_to',  'mon_from', 'mon_to',  'tue_from', 'tue_to',  'wen_from', 'wen_to',  'thu_from', 'thu_to',  'fri_from', 'fri_to'
    ];

    public function doctor(){
        return $this->belongsTo("App\Doctors" , "name");
    }
}
