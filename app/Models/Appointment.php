<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'clinic_schedule_id',
        'patient_id'
    ];
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    public function clinic_schedule()
    {
        return $this->belongsTo(Clinic_schedule::class);
    }
    public function visit()
    {
        return $this->hasOne(Visit::class);
    }
}
