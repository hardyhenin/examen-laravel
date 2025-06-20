<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Illuminate\Http\Request;

class VehiculesController extends Controller
{
    public function index()
    {
        $vehicules = Vehicule::all();
        return view('vehicules.index', compact('vehicules'));
    }

    public function create()
    {
        return view('vehicules.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'immatriculation' => 'required|unique:vehicules,immatriculation',
            'marque' => 'required|string|max:255',
            'modele' => 'required|string|max:255',
            'statu' => 'required|string|max:255',
        ]);

        Vehicule::create($request->all());

        return redirect()->route('vehicules.index')->with('success', 'Véhicule ajouté avec succès.');
    }

    public function show(Vehicule $vehicule)
    {
        return view('vehicules.show', compact('vehicule'));
    }

    public function edit(Vehicule $vehicule)
    {
        return view('vehicules.edit', compact('vehicule'));
    }

    public function update(Request $request, Vehicule $vehicule)
    {
        $request->validate([
            'immatriculation' => 'required|unique:vehicules,immatriculation,' . $vehicule->id,
            'marque' => 'required|string|max:255',
            'modele' => 'required|string|max:255',
            'statu' => 'required|string|max:255',
        ]);

        $vehicule->update($request->all());

        return redirect()->route('vehicules.index')->with('success', 'Véhicule mis à jour avec succès.');
    }

    public function destroy(Vehicule $vehicule)
    {
        $vehicule->delete();

        return redirect()->route('vehicules.index')->with('success', 'Véhicule supprimé avec succès.');
    }
}