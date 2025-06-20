@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Modifier le Trajet</h2>
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

        <form action="{{ route('trajets.update', $trajet->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="depart" class="form-label">Départ</label>
                <input type="text" class="form-control" id="depart" name="depart" value="{{ old('depart', $trajet->depart) }}" required>
            </div>

            <div class="mb-3">
                <label for="destination" class="form-label">Destination</label>
                <input type="text" class="form-control" id="destination" name="destination" value="{{ old('destination', $trajet->destination) }}" required>
            </div>

            <div class="mb-3">
                <label for="duree_estimee" class="form-label">Durée Estimée</label>
                <input type="text" class="form-control" id="duree_estimee" name="duree_estimee" value="{{ old('duree_estimee', $trajet->duree_estimee) }}" required>
            </div>

            <button type="submit" class="btn btn-success">Mettre à Jour le Trajet</button>
            <a href="{{ route('trajets.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection