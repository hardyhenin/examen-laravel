@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Ajouter un Nouveau Véhicule</h2>
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

        <form action="{{ route('vehicules.store') }}" method="POST">
            @csrf {{-- Protection CSRF obligatoire pour tous les formulaires POST --}}

            <div class="mb-3">
                <label for="immatriculation" class="form-label">Immatriculation</label>
                <input type="text" class="form-control" id="immatriculation" name="immatriculation" value="{{ old('immatriculation') }}" required>
            </div>

            <div class="mb-3">
                <label for="marque" class="form-label">Marque</label>
                <input type="text" class="form-control" id="marque" name="marque" value="{{ old('marque') }}" required>
            </div>

            <div class="mb-3">
                <label for="modele" class="form-label">Modèle</label>
                <input type="text" class="form-control" id="modele" name="modele" value="{{ old('modele') }}" required>
            </div>

            <div class="mb-3">
                <label for="statu" class="form-label">Statut</label>
                <select class="form-select" id="statu" name="statu" required>
                    <option value="">Sélectionner un statut</option>
                    <option value="disponible" {{ old('statu') == 'disponible' ? 'selected' : '' }}>Disponible</option>
                    <option value="en_mission" {{ old('statu') == 'en_mission' ? 'selected' : '' }}>En mission</option>
                    <option value="en_maintenance" {{ old('statu') == 'en_maintenance' ? 'selected' : '' }}>En maintenance</option>
                    {{-- Ajoute d'autres statuts si nécessaire --}}
                </select>
            </div>

            <button type="submit" class="btn btn-success">Ajouter le Véhicule</button>
            <a href="{{ route('vehicules.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection