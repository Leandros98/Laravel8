<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    use HasFactory;
    //protected $table = 'pays'; 
    protected $fillable = [
        'nom',
        'code'
    ];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
   // Assurez-vous que le nom de la table correspond à votre table dans la base de données
 
}
