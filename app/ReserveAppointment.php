<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReserveAppointment extends Model
{
    protected $table = 'reserve_appointments';

    protected $fillable = [
        'patient', 'doctor', 'appointment_status', 'date' , 'notes'
    ];

    public function patient_name(){
        return $this->belongsTo("App\Patients" , "patient");
    }
    
    public function doctor_name(){
        return $this->belongsTo("App\Doctors" , "doctor");
    }
}
