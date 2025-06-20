@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2>Détails du Véhicule : {{ $vehicule->immatriculation }}</h2>
        <div>
            <a href="{{ route('vehicules.edit', $vehicule->id) }}" class="btn btn-warning me-2">Modifier</a>
            <form action="{{ route('vehicules.destroy', $vehicule->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce véhicule ?')">Supprimer</button>
            </form>
        </div>
    </div>
    <div class="card-body">
        <p><strong>ID :</strong> {{ $vehicule->id }}</p>
        <p><strong>Immatriculation :</strong> {{ $vehicule->immatriculation }}</p>
        <p><strong>Marque :</strong> {{ $vehicule->marque }}</p>
        <p><strong>Modèle :</strong> {{ $vehicule->modele }}</p>
        <p><strong>Statut :</strong> {{ $vehicule->statu }}</p> {{-- Attention 'statu' ici --}}
        <p><strong>Créé le :</strong> {{ $vehicule->created_at->format('d/m/Y H:i') }}</p>
        <p><strong>Mis à jour le :</strong> {{ $vehicule->updated_at->format('d/m/Y H:i') }}</p>
    </div>
    <div class="card-footer">
        <a href="{{ route('vehicules.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </div>
</div>
@endsection