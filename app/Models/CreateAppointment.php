<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateAppointment extends Model
{
    use HasFactory;
    protected $table = 'create_appointments';
    protected $fillable = [
        'name',
        'age',
        'gender',
        'phone',
        'datetime',
        'doctorName',
        'hospitalName',
        'describeProblem',
        'optional1',
        'optional2',
    ];
}
