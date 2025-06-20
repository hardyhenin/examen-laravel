@extends('layouts.app') {{-- Utilise le layout de base --}}

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2>Liste des Véhicules</h2>
        <a href="{{ route('vehicules.create') }}" class="btn btn-primary">Ajouter un Véhicule</a>
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
                    <th>Immatriculation</th>
                    <th>Marque</th>
                    <th>Modèle</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($vehicules as $vehicule)
                <tr>
                    <td>{{ $vehicule->id }}</td>
                    <td>{{ $vehicule->immatriculation }}</td>
                    <td>{{ $vehicule->marque }}</td>
                    <td>{{ $vehicule->modele }}</td>
                    <td>{{ $vehicule->statu }}</td> {{-- Attention 'statu' ici --}}
                    <td>
                        <a href="{{ route('vehicules.show', $vehicule->id) }}" class="btn btn-info btn-sm me-1">Voir</a>
                        <a href="{{ route('vehicules.edit', $vehicule->id) }}" class="btn btn-warning btn-sm me-1">Modifier</a>
                        <form action="{{ route('vehicules.destroy', $vehicule->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce véhicule ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Aucun véhicule enregistré.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection