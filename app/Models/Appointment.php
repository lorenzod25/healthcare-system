<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'provider_id',
        'scheduled_at',
        'reason',
    ];

    // Each appointment belongs to a patient
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    // Each appointment belongs to a provider
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    // Each appointment has one medical record
    public function medicalRecord()
    {
        return $this->hasOne(MedicalRecord::class);
    }
}
