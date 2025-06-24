@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2>Liste des Passagers</h2>
        <a href="{{ route('passagers.create') }}" class="btn btn-primary">Ajouter un Passager</a>
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
                    <th>Prénom</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Adresse</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($passagers as $passager)
                <tr>
                    <td>{{ $passager->id }}</td>
                    <td>{{ $passager->nom }}</td>
                    <td>{{ $passager->prenom }}</td>
                    <td>{{ $passager->contact ?? 'N/A' }}</td>
                    <td>{{ $passager->email ?? 'N/A' }}</td>
                    <td>{{ $passager->adresse ?? 'N/A' }}</td>
                    <td>
                        <div class>
                            <a href="{{ route('passagers.show', $passager->id) }}" class="btn btn-info btn-sm me-1">Voir</a>
                            <a href="{{ route('passagers.edit', $passager->id) }}" class="btn btn-warning btn-sm me-1">Modifier</a>
                         <form action="{{ route('passagers.destroy', $passager->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce passager ?')">Supprimer</button>
                         </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Aucun passager enregistré.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection