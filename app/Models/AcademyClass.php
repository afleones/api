<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str; 

class AcademyClass extends Model
{
    use HasFactory;

    protected $connection = 'academy';
    protected $table = 'Class';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($table) {
            $table->Id = Str::random(10); // Generar un código alfanumérico único de 10 caracteres
        });
    }
}
    