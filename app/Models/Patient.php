<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'full_name',
        'age',
        'phone',
        'address'
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}
