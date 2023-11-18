<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'categorie',
        'description', 
        'adresse',
        'status',
        'date_enregistrement',
        'user_id',
    ];
    
}

