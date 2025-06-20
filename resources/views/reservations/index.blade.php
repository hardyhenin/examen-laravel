@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2>Liste des Réservations</h2>
        <a href="{{ route('reservations.create') }}" class="btn btn-primary">Ajouter une Réservation</a>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Passager</th>
                    <th>Trajet</th>
                    <th>Véhicule</th>
                    <th>Chauffeur</th>
                    <th>Date Réservation</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->passager->prenom ?? 'N/A' }} {{ $reservation->passager->nom ?? '' }}</td>
                    <td>{{ $reservation->trajet->depart ?? 'N/A' }} à {{ $reservation->trajet->destination ?? '' }}</td>
                    <td>{{ $reservation->vehicule->marque ?? 'Non attribué' }}</td>
                    <td>{{ $reservation->chauffeur->prenom ?? 'Non attribué' }} {{ $reservation->chauffeur->nom ?? '' }}</td>
                    <td>{{ $reservation->date_reservation->format('d/m/Y H:i') }}</td>
                    <td>{{ $reservation->statut }}</td>
                    <td>
                        <a href="{{ route('reservations.show', $reservation->id) }}" class="btn btn-info btn-sm me-1">Voir</a>
                        <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-warning btn-sm me-1">Modifier</a>
                        <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">Aucune réservation enregistrée.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection