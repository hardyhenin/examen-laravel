@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Modifier la Réservation</h2>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="passagers_id" class="form-label">Passager</label>
                <select class="form-control" id="passagers_id" name="passagers_id" required>
                    <option value="">Sélectionner un passager</option>
                    @foreach ($passagers as $passager)
                        <option value="{{ $passager->id }}" {{ (old('passagers_id', $reservation->passagers_id) == $passager->id) ? 'selected' : '' }}>
                            {{ $passager->prenom }} {{ $passager->nom }} (Contact: {{ $passager->contact }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="trajets_id" class="form-label">Trajet</label>
                <select class="form-control" id="trajets_id" name="trajets_id" required>
                    <option value="">Sélectionner un trajet</option>
                    @foreach ($trajets as $trajet)
                        <option value="{{ $trajet->id }}" {{ (old('trajets_id', $reservation->trajets_id) == $trajet->id) ? 'selected' : '' }}>
                            {{ $trajet->depart }} à {{ $trajet->destination }} (Durée: {{ $trajet->duree_estimee }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="vehicules_id" class="form-label">Véhicule (Optionnel)</label>
                <select class="form-control" id="vehicules_id" name="vehicules_id">
                    <option value="">Sélectionner un véhicule</option>
                    @foreach ($vehicules as $vehicule)
                        <option value="{{ $vehicule->id }}" {{ (old('vehicules_id', $reservation->vehicules_id) == $vehicule->id) ? 'selected' : '' }}>
                            {{ $vehicule->marque }} {{ $vehicule->modele }} ({{ $vehicule->immatriculation }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="chauffeurs_id" class="form-label">Chauffeur (Optionnel)</label>
                <select class="form-control" id="chauffeurs_id" name="chauffeurs_id">
                    <option value="">Sélectionner un chauffeur</option>
                    @foreach ($chauffeurs as $chauffeur)
                        <option value="{{ $chauffeur->id }}" {{ (old('chauffeurs_id', $reservation->chauffeurs_id) == $chauffeur->id) ? 'selected' : '' }}>
                            {{ $chauffeur->prenom }} {{ $chauffeur->nom }} (Permis: {{ $chauffeur->numero_permis }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="date_reservation" class="form-label">Date et Heure de Réservation</label>
                <input type="datetime-local" class="form-control" id="date_reservation" name="date_reservation" value="{{ old('date_reservation', $reservation->date_reservation ? $reservation->date_reservation->format('Y-m-d\TH:i') : '') }}" required>
            </div>

            <div class="mb-3">
                <label for="statut" class="form-label">Statut</label>
                <select class="form-control" id="statut" name="statut" required>
                    <option value="en_attente" {{ (old('statut', $reservation->statut) == 'en_attente') ? 'selected' : '' }}>En attente</option>
                    <option value="confirmée" {{ (old('statut', $reservation->statut) == 'confirmée') ? 'selected' : '' }}>Confirmée</option>
                    <option value="terminée" {{ (old('statut', $reservation->statut) == 'terminée') ? 'selected' : '' }}>Terminée</option>
                    <option value="annulée" {{ (old('statut', $reservation->statut) == 'annulée') ? 'selected' : '' }}>Annulée</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Mettre à Jour la Réservation</button>
            <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection