@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2>Liste des Trajets</h2>
        <a href="{{ route('trajets.create') }}" class="btn btn-primary">Ajouter un Trajet</a>
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
                    <th>Départ</th>
                    <th>Destination</th>
                    <th>Durée Estimée</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($trajets as $trajet)
                <tr>
                    <td>{{ $trajet->id }}</td>
                    <td>{{ $trajet->depart }}</td>
                    <td>{{ $trajet->destination }}</td>
                    <td>{{ $trajet->duree_estimee }}</td>
                    <td>
                        <a href="{{ route('trajets.show', $trajet->id) }}" class="btn btn-info btn-sm me-1">Voir</a>
                        <a href="{{ route('trajets.edit', $trajet->id) }}" class="btn btn-warning btn-sm me-1">Modifier</a>
                        <form action="{{ route('trajets.destroy', $trajet->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce trajet ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Aucun trajet enregistré.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection