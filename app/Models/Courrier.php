<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Courrier extends Model
{
    protected $table = 'new_courrier'; // Nom de la table dans la base de données

    protected $fillable = [
        'reference',
        'date',
        'envoye_depuis',
        'objet',
        'message',
        'attachment',
    ];

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    // Vous pouvez ajouter d'autres propriétés et méthodes selon les besoins de votre application
}
