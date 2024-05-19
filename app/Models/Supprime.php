<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supprime extends Model
{
    protected $table = 'supprime';
    protected $fillable = [
        'reference',
        'date',
        'envoye_depuis',
        'objet',
        'message',
        'attachment'
    ];
}
