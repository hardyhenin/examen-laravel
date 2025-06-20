<?php

namespace App\Http\Controllers;

use App\Models\Passager;
use Illuminate\Http\Request;

class PassagerController extends Controller
{
    /**
     * Affiche une liste des passagers.
     */
    public function index()
    {
        $passagers = Passagers::paginate(10);
        return view('passagers.index', compact('passagers'));
    }

    /**
     * Affiche le formulaire de création de passager.
     */
    public function create()
    {
        return view('passagers.create');
    }

    /**
     * Stocke un nouveau passager dans la base de données.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'contact' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:passagers,email|max:255',
            'adresse' => 'nullable|string|max:255',
        ]);

        Passager::create($request->all());
        return redirect()->route('passagers.index')->with('success', 'Passager ajouté avec succès.');
    }

    /**
     * Affiche les détails d'un passager spécifique.
     */
    public function show(Passager $passager)
    {
        return view('passagers.show', compact('passager'));
    }

    /**
     * Affiche le formulaire d'édition d'un passager.
     */
    public function edit(Passager $passager)
    {
        return view('passagers.edit', compact('passager'));
    }

    /**
     * Met à jour un passager existant.
     */
    public function update(Request $request, Passager $passager)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'contact' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:passagers,email,' . $passager->id . '|max:255',
            'adresse' => 'nullable|string|max:255',
        ]);

        $passager->update($request->all());
        return redirect()->route('passagers.index')->with('success', 'Passager mis à jour avec succès.');
    }

    /**
     * Supprime un passager.
     */
    public function destroy(Passager $passager)
    {
        $passager->delete();
        return redirect()->route('passagers.index')->with('success', 'Passager supprimé avec succès.');
    }
}