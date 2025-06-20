<?php

namespace App\Http\Controllers;

use App\Models\Trajet;
use Illuminate\Http\Request;

class TrajetController extends Controller
{
    public function index()
    {
        $trajets = Trajet::all();
        return view('trajets.index', compact('trajets'));
    }

    public function create()
    {
        return view('trajets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'depart' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'duree_estimee' => 'required|string|max:255',
        ]);

        Trajet::create($request->all());

        return redirect()->route('trajets.index')->with('success', 'Trajet ajouté avec succès.');
    }

    public function show(Trajet $trajet)
    {
        return view('trajets.show', compact('trajet'));
    }

    public function edit(Trajet $trajet)
    {
        return view('trajets.edit', compact('trajet'));
    }

    public function update(Request $request, Trajet $trajet)
    {
        $request->validate([
            'depart' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'duree_estimee' => 'required|string|max:255',
        ]);

        $trajet->update($request->all());

        return redirect()->route('trajets.index')->with('success', 'Trajet mis à jour avec succès.');
    }

    public function destroy(Trajet $trajet)
    {
        $trajet->delete();

        return redirect()->route('trajets.index')->with('success', 'Trajet supprimé avec succès.');
    }
}