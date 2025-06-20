@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2>Liste des Chauffeurs</h2>
        <a href="{{ route('chauffeurs.create') }}" class="btn btn-primary">Ajouter un Chauffeur</a>
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
                    <th>Nom</th>
                    <th>Contact</th>
                    <th>Disponibilité</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($chauffeurs as $chauffeur)
                <tr>
                    <td>{{ $chauffeur->id }}</td>
                    <td>{{ $chauffeur->nom }}</td>
                    <td>{{ $chauffeur->contact }}</td>
                    <td>{{ $chauffeur->disponibilité }}</td> {{-- Attention à l'accent ici --}}
                    <td>
                        <a href="{{ route('chauffeurs.show', $chauffeur->id) }}" class="btn btn-info btn-sm me-1">Voir</a>
                        <a href="{{ route('chauffeurs.edit', $chauffeur->id) }}" class="btn btn-warning btn-sm me-1">Modifier</a>
                        <form action="{{ route('chauffeurs.destroy', $chauffeur->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce chauffeur ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Aucun chauffeur enregistré.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection