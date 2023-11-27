<?php

namespace App\Models;

use App\Models\Imagechambre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bien extends Model
{
    use HasFactory;
    protected $guarded = [];
  protected $attributes = [
    'status' => 0,
    'categorie' => 0,
    'toillette' => 0,
    'espace_vert' => 0,
    'balcons'  => 0,
  ];

    protected $fillable = [
        'nom',
        'categorie',
        'image_biens',
        'description',
        'adresse',
        'status',
        'user_id',
        'surface',
        'nombre_chambre',
        'toillette',
        'balcons',
        'espaces_verts',
    ];

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    public function imagechambres()
    {
        return $this->hasMany(Imagechambre::class);
    }
    public function scopeStatus($query)
    {
            return $query->where('status', 1)->get();
     
    }
    public function scopeCategorie($query)
    {
            return $query->where('categorie', 1)->get();
     
    }
    public function scopeToillettes($query)
    {
            return $query->where('toillette', 1)->get();
     
    }
    public function scopeEspaceVert($query)
    {
            return $query->where('espace_vert', 1)->get();
     
    }
    public function scopeBalcon($query)
    {
            return $query->where('balcons', 1)->get();
     
    }
   
    public function getStatusAttribute($attribute){

        return $this->getStatusOptions()[$attribute];
    }
   
    public function getCategorieAttribute($attribute){

        return $this->getCategorieOptions()[$attribute];
    }
    public function getToiletteAttribute($attribute){

        return $this->getToiletteOptions()[$attribute];
    }
    public function getEspaceVertAttribute($attribute){

        return $this->getEspaceVertOptions()[$attribute];
    }
    public function getBalconAttribute($attribute){

        return $this->getBalconOptions()[$attribute];
    }
    public function getStatusOptions(){
        return [
            '0' => 'Disponible',
            '1' => 'Occupé',
        ];
    }
  
    public function getCategorieOptions(){
        return [
            '0' => 'Luxe',
            '1' => 'Simple',
            '2' => 'Moyen',
        ];
    }
    public function getToiletteOptions(){
        return [
            '0' => 'toillettes intérieures',
            '1' => 'toillettes exterieures',
            '2' => 'toillettes externes et internes',
        ];
    }
    public function getBalconOptions(){
        return [
            '0' => 'Oui',
            '1' => 'Non',
        ];
    }
    public function getEspaceVertOptions(){
        return [
            '0' => 'Non',
            '1' => 'Oui',
        ];
    }
}
