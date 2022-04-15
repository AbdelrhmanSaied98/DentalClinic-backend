<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor_assessment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'diagnosis',
        'prescription',
        'lab',
        'visit_id'
    ];
    public function visit()
    {
        return $this->belongsTo(Visit::class);
    }
}
