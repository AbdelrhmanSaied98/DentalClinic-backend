<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic_schedule extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'date',
        'time'
    ];
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
