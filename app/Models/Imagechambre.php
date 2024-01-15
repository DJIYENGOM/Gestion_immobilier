<?php

namespace App\Models;

use App\Models\Bien;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Imagechambre extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'image_path' => 'array',
    ];

    public function biens()
    {
        return $this->belongsTo(Bien::class);
    }
}
