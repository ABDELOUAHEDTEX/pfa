<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewCourrierexterne extends Model
{
    use HasFactory;
    protected $table = 'new_courrierexterne';
    protected $fillable = [
        'reference',
        'date',
        'envoye_a',
        'objet',
        'message',
        'created_at',
        'updated_at'
    ];
}