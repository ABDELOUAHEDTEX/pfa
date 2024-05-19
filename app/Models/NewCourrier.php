<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewCourrier extends Model
{
    use HasFactory;
    protected $table = 'new_courrier';
    protected $fillable = [
        'reference',
        'date',
        'envoye_depuis',
        'envoye_a',
        'objet',
        'message',
        'created_at',
        'updated_at'
    ];
    public function envoyeAs()
    {
        return $this->hasMany(EnvoyeA::class);
    }
}