@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row mb-5 text-center">
        <div class="col">
            <h1 class="display-5 fw-bold">Bienvenue sur le Tableau de Bord <span class="text-primary">Hardy's Transport</span></h1>
            <p class="lead text-muted">Gérez efficacement vos véhicules, chauffeurs, passagers, trajets et réservations.</p>
        </div>
    </div>

    <div class="row g-4">
        {{-- Véhicules --}}
        <div class="col-md-4">
            <div class="card dashboard-card border-0 shadow h-100 bg-gradient bg-primary text-white">
                <div class="card-body text-center">
                    <i class="bi bi-truck fs-1 mb-3"></i>
                    <h3>{{ $totalVehicules }}</h3>
                    <p>Véhicules Enregistrés</p>
                    <a href="{{ route('vehicules.index') }}" class="btn btn-light btn-sm">Voir les Véhicules</a>
                </div>
            </div>
        </div>

        {{-- Chauffeurs --}}
        <div class="col-md-4">
            <div class="card dashboard-card border-0 shadow h-100 bg-gradient bg-success text-white">
                <div class="card-body text-center">
                    <i class="bi bi-person-badge fs-1 mb-3"></i>
                    <h3>{{ $totalChauffeurs }}</h3>
                    <p>Chauffeurs Disponibles</p>
                    <a href="{{ route('chauffeurs.index') }}" class="btn btn-light btn-sm">Voir les Chauffeurs</a>
                </div>
            </div>
        </div>

        {{-- Passagers --}}
        <div class="col-md-4">
            <div class="card dashboard-card border-0 shadow h-100 bg-gradient bg-info text-white">
                <div class="card-body text-center">
                    <i class="bi bi-people fs-1 mb-3"></i>
                    <h3>{{ $totalPassagers }}</h3>
                    <p>Passagers Inscrits</p>
                    <a href="{{ route('passagers.index') }}" class="btn btn-light btn-sm">Voir les Passagers</a>
                </div>
            </div>
        </div>

        {{-- Trajets --}}
        <div class="col-md-6">
            <div class="card dashboard-card border-0 shadow h-100 bg-gradient bg-warning text-dark">
                <div class="card-body text-center">
                    <i class="bi bi-geo-alt fs-1 mb-3"></i>
                    <h3>{{ $totalTrajets }}</h3>
                    <p>Trajets Planifiés</p>
                    <a href="{{ route('trajets.index') }}" class="btn btn-dark btn-sm">Voir les Trajets</a>
                </div>
            </div>
        </div>

        {{-- Réservations --}}
        <div class="col-md-6">
            <div class="card dashboard-card border-0 shadow h-100 bg-gradient bg-danger text-white">
                <div class="card-body text-center">
                    <i class="bi bi-calendar-check fs-1 mb-3"></i>
                    <h3>{{ $totalReservations }}</h3>
                    <p>Réservations Actives</p>
                    <a href="{{ route('reservations.index') }}" class="btn btn-light btn-sm">Voir les Réservations</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col text-center">
            <p class="text-muted">Utilisez les liens pour accéder rapidement à chaque module de gestion.</p>
        </div>
    </div>
</div>
@endsection
