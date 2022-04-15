<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'appointment_id',
        'type',
        'serves',
        'patient_id'
    ];
    protected $casts = [
        'serves' => 'array'
    ];
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
    public function serve()
    {
        return $this->hasMany(Serve::class);
    }
    public function doctor_assessments()
    {
        return $this->hasMany(Doctor_assessment::class);
    }
}
