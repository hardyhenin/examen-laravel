@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Modifier le Chauffeur : {{ $chauffeur->nom }}</h2>
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

        <form action="{{ route('chauffeurs.update', $chauffeur->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nom" class="form-label">Nom du Chauffeur</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $chauffeur->nom) }}" required>
            </div>

            <div class="mb-3">
                <label for="contact" class="form-label">Contact</label>
                <input type="text" class="form-control" id="contact" name="contact" value="{{ old('contact', $chauffeur->contact) }}">
            </div>

            <div class="mb-3">
                <label for="disponibilité" class="form-label">Disponibilité</label>
                <select class="form-select" id="disponibilité" name="disponibilité" required>
                    <option value="">Sélectionner une disponibilité</option>
                    <option value="disponible" {{ old('disponibilité', $chauffeur->disponibilité) == 'disponible' ? 'selected' : '' }}>Disponible</option>
                    <option value="en_mission" {{ old('disponibilité', $chauffeur->disponibilité) == 'en_mission' ? 'selected' : '' }}>En mission</option>
                    <option value="en_repos" {{ old('disponibilité', $chauffeur->disponibilité) == 'en_repos' ? 'selected' : '' }}>En repos</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Mettre à Jour le Chauffeur</button>
            <a href="{{ route('chauffeurs.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection