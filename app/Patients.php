<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    protected $table = 'patients';

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'mobile', 'blood_group', 'birth_date', 'gender', 'image', 'address', 'status'
    ];

    public function patient_documents(){
        return $this->hasOne("App\PatientDocuments" , "patient");
    }
}
