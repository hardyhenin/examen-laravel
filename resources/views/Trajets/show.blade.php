@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2>Détails du Trajet</h2>
        <div>
            <a href="{{ route('trajets.edit', $trajet->id) }}" class="btn btn-warning me-2">Modifier</a>
            <form action="{{ route('trajets.destroy', $trajet->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce trajet ?')">Supprimer</button>
            </form>
        </div>
    </div>
    <div class="card-body">
        <p><strong>ID :</strong> {{ $trajet->id }}</p>
        <p><strong>Départ :</strong> {{ $trajet->depart }}</p>
        <p><strong>Destination :</strong> {{ $trajet->destination }}</p>
        <p><strong>Durée Estimée :</strong> {{ $trajet->duree_estimee }}</p>

        <hr>

        <p><strong>Créé le :</strong> {{ $trajet->created_at->format('d/m/Y H:i') }}</p>
        <p><strong>Mis à jour le :</strong> {{ $trajet->updated_at->format('d/m/Y H:i') }}</p>
    </div>
    <div class="card-footer">
        <a href="{{ route('trajets.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </div>
</div>
@endsection