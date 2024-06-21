<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'categorie_id',
        'pays_id',
        'nom',
        'prenom',
        'email',
        'telephone',
        'adresse',
        'anniversaire',
        'entreprise',
        'fonction',
        'service',
        'titre',
        'site_web',
        'reseau_sociaux',
        'note',
        'favori',
      
    
    ];
    public function categories()
{
    return $this->belongsToMany(Categorie::class, 'contact_categorie');
}
public function pays()
{
    return $this->belongsTo(Pays::class);
}
}
