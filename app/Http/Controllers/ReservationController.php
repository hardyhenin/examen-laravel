<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Trajet;
use App\Models\Passager;
use App\Models\Vehicule;
use App\Models\Chauffeur;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['passager', 'trajet', 'vehicule', 'chauffeur'])->get();
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $trajets = Trajet::all();
        $passagers = Passager::all();
        $vehicules = Vehicule::all();
        $chauffeurs = Chauffeur::all();
        return view('reservations.create', compact('trajets', 'passagers', 'vehicules', 'chauffeurs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'passagers_id' => 'required|exists:passagers,id',
            'trajets_id' => 'required|exists:trajets,id',
            'vehicules_id' => 'nullable|exists:vehicules,id',
            'chauffeurs_id' => 'nullable|exists:chauffeurs,id',
            'date_reservation' => 'required|date',
            'statut' => 'required|in:en_attente,confirmée,terminée,annulée',
        ]);

        Reservation::create($request->all());

        return redirect()->route('reservations.index')->with('success', 'Réservation ajoutée avec succès.');
    }

    public function show(Reservation $reservation)
    {
        $reservation->load(['passager', 'trajet', 'vehicule', 'chauffeur']);
        return view('reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        $trajets = Trajet::all();
        $passagers = Passager::all();
        $vehicules = Vehicule::all();
        $chauffeurs = Chauffeur::all();
        return view('reservations.edit', compact('reservation', 'trajets', 'passagers', 'vehicules', 'chauffeurs'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'passagers_id' => 'required|exists:passagers,id',
            'trajets_id' => 'required|exists:trajets,id',
            'vehicules_id' => 'nullable|exists:vehicules,id',
            'chauffeurs_id' => 'nullable|exists:chauffeurs,id',
            'date_reservation' => 'required|date',
            'statut' => 'required|in:en_attente,confirmée,terminée,annulée',
        ]);

        $reservation->update($request->all());

        return redirect()->route('reservations.index')->with('success', 'Réservation mise à jour avec succès.');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', 'Réservation supprimée avec succès.');
    }
}