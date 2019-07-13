<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    protected $table = 'doctors';

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'mobile', 'department', 'gender', 'image', 'address', 'status'
    ];

    public function patient_documents(){
        return $this->hasOne("App\PatientDocuments" , "doctor");
    }
    
    public function doctor_appointment(){
        return $this->belongsTo("App\DoctorAppointments" , "name");
    }
}
