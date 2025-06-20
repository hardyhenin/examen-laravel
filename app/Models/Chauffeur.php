<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chauffeur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'contact',
        'disponibilité', // Assure-toi que c'est bien 'disponibilité' avec l'accent
    ];
}