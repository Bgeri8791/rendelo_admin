<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_number',
        'first_name',
        'last_name',
        'id_type',
        'email',
        'phone',
        'birth_date',
        'is_active',
    ];
    public function visits()
    {
        return $this->hasMany(Visits::class, 'patient_id', 'id');
    }
}
