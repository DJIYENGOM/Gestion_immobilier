<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $fillable = [
        'contenue',
        'bien_id',
        'user_id',
    ];
    public function bien()
    {
        return $this->belongsTo(Bien::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
