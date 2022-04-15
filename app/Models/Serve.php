<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serve extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'visit_id',
        'procedure_id'
    ];
    public function visit()
    {
        return $this->belongsTo(Visit::class);
    }
    public function procedure()
    {
        return $this->belongsTo(Procedure::class);
    }
}
