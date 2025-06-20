@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2>Détails de la Réservation</h2>
        <div>
            <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-warning me-2">Modifier</a>
            <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?')">Supprimer</button>
            </form>
        </div>
    </div>
    <div class="card-body">
        <p><strong>ID :</strong> {{ $reservation->id }}</p>
        <p><strong>Passager :</strong> {{ $reservation->passager->prenom ?? 'N/A' }} {{ $reservation->passager->nom ?? '' }}</p>
        <p><strong>Trajet :</strong> {{ $reservation->trajet->depart ?? 'N/A' }} à {{ $reservation->trajet->destination ?? '' }}</p>
        <p><strong>Véhicule :</strong> {{ $reservation->vehicule->marque ?? 'Non attribué' }} {{ $reservation->vehicule->modele ?? '' }}</p>
        <p><strong>Chauffeur :</strong> {{ $reservation->chauffeur->prenom ?? 'Non attribué' }} {{ $reservation->chauffeur->nom ?? '' }}</p>
        <p><strong>Date et Heure de Réservation :</strong> {{ $reservation->date_reservation->format('d/m/Y H:i') }}</p>
        <p><strong>Statut :</strong> {{ $reservation->statut }}</p>

        <hr>

        <p><strong>Créé le :</strong> {{ $reservation->created_at->format('d/m/Y H:i') }}</p>
        <p><strong>Mis à jour le :</strong> {{ $reservation->updated_at->format('d/m/Y H:i') }}</p>
    </div>
    <div class="card-footer">
        <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </div>
</div>
@endsection