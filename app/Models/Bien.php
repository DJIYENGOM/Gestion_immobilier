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
        'image',
        'description', 
        'adresse',
        'status',
        'user_id',
    ];
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
    
}

