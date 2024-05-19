<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AjouterUser extends Model
{
    protected $table = 'ajouter_user';

    protected $fillable = [
        'Nom',
        'Prénom',
        
        'Service',
        'Fonction',
        'email',
        'password'
    ];
}
