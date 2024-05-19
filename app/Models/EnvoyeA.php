<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnvoyeA extends Model
{
    use HasFactory;
    protected $table = 'envoye_a';
    protected $fillable = [
        'new_courrier_id', 'envoye_a',   'created_at',
        'updated_at'
    ];
    public function newCourrier()
    {
        return $this->belongsTo(NewCourrier::class);
    }
}