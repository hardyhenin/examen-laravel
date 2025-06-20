<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'passagers_id',
        'trajets_id',
        'vehicules_id',
        'chauffeurs_id',
        'date_reservation',
        'statut',
    ];

    protected $casts = [
        'date_reservation' => 'datetime',
    ];

    public function passager()
    {
        return $this->belongsTo(Passager::class, 'passagers_id');
    }

    public function trajet()
    {
        return $this->belongsTo(Trajet::class, 'trajets_id');
    }

    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class, 'vehicules_id');
    }

    public function chauffeur()
    {
        return $this->belongsTo(Chauffeur::class, 'chauffeurs_id');
    }
}