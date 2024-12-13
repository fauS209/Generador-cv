<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use HasFactory;

    // Definir los campos que son asignables masivamente
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'experience',
        'education',
        'skills',
        'portfolio',
    ];
}
