<?php
// app/Models/Commentaire.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'bien_id', 'contenue'];

    // Relation avec l'utilisateur
    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relation avec le bien
    public function bien()
    {
        return $this->belongsTo(Bien::class, 'bien_id');
    }

    // Contrainte unique pour un utilisateur par bien
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($commentaire) {
            // Vérifiez si un commentaire existe déjà pour cet utilisateur et ce bien
            $existingCommentaire = static::where('user_id', $commentaire->user_id)
                ->where('bien_id', $commentaire->bien_id)
                ->first();

            if ($existingCommentaire) {
                // Annulez la création si un commentaire existe déjà
                return false;
            }
        });
    }
}
