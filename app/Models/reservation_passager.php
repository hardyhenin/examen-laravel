<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'trajets_id',
        'vehicules_id',
        'chauffeurs_id',
        'date_reservation',
        'statut',
    ];

    protected $casts = [
        'date_reservation' => 'datetime',
        'statut' => 'string',
    ];

   

    public function passagers() 
    {
        return $this->belongsToMany(Passager::class, 'reservation_passager', 'reservations_id', 'passagers_id')->withTimestamps();
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