<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use App\Models\Chauffeur;
use App\Models\Passager;
use App\Models\Trajet;
use App\Models\Reservation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalVehicules = Vehicule::count();
        $totalChauffeurs = Chauffeur::count();
        $totalPassagers = Passager::count();
        $totalTrajets = Trajet::count();
        $totalReservations = Reservation::count();

        return view('dashboard.index', compact(
            'totalVehicules',
            'totalChauffeurs',
            'totalPassagers',
            'totalTrajets',
            'totalReservations'
        ));
    }
}