@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Modifier le Passager</h2>
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

        <form action="{{ route('passagers.update', $passager->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $passager->nom) }}" required>
            </div>

            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="{{ old('prenom', $passager->prenom) }}" required>
            </div>

            <div class="mb-3">
                <label for="contact" class="form-label">Contact (optionnel)</label>
                <input type="text" class="form-control" id="contact" name="contact" value="{{ old('contact', $passager->contact) }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email (optionnel)</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $passager->email) }}">
            </div>

            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse (optionnel)</label>
                <input type="text" class="form-control" id="adresse" name="adresse" value="{{ old('adresse', $passager->adresse) }}">
            </div>

            <button type="submit" class="btn btn-success">Mettre à Jour le Passager</button>
            <a href="{{ route('passagers.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection