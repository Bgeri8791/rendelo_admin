<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visits extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'visit_date',
        'reason',
        'diagnosis',
        'price',
    ];

    public function patient()
    {
        return $this->belongsTo(Patients::class, 'patient_id', 'id');
    }
}
