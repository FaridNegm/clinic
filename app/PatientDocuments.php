<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientDocuments extends Model
{
    protected $table = 'patient_documents';

    protected $fillable = [
        'date', 'patient', 'doctor', 'document_title', 'files'
    ];

    public function doctor_name(){
        return $this->belongsTo("App\Doctors" , "doctor");
    }
    
    public function patient_name(){
        return $this->belongsTo("App\Patients" , "patient");
    }
}
