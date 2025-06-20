@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2>Détails du Chauffeur : {{ $chauffeur->nom }}</h2>
        <div>
            <a href="{{ route('chauffeurs.edit', $chauffeur->id) }}" class="btn btn-warning me-2">Modifier</a>
            <form action="{{ route('chauffeurs.destroy', $chauffeur->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce chauffeur ?')">Supprimer</button>
            </form>
        </div>
    </div>
    <div class="card-body">
        <p><strong>ID :</strong> {{ $chauffeur->id }}</p>
        <p><strong>Nom :</strong> {{ $chauffeur->nom }}</p>
        <p><strong>Contact :</strong> {{ $chauffeur->contact }}</p>
        <p><strong>Disponibilité :</strong> {{ $chauffeur->disponibilité }}</p> {{-- Attention à l'accent ici --}}
        <p><strong>Créé le :</strong> {{ $chauffeur->created_at->format('d/m/Y H:i') }}</p>
        <p><strong>Mis à jour le :</strong> {{ $chauffeur->updated_at->format('d/m/Y H:i') }}</p>
    </div>
    <div class="card-footer">
        <a href="{{ route('chauffeurs.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </div>
</div>
@endsection