<?php

namespace App\Http\Controllers;

use App\Models\Passager;
use Illuminate\Http\Request;

class PassagersController extends Controller
{
    public function index()
    {
        $passagers = Passager::all();
        return view('passagers.index', compact('passagers'));
    }

    public function create()
    {
        return view('passagers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'contact' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'adresse' => 'nullable|string|max:255', 
        ]);

        Passager::create($request->all());

        return redirect()->route('passagers.index')->with('success', 'Passager ajouté avec succès.');
    }

    public function show(Passager $passager)
    {
        return view('passagers.show', compact('passager'));
    }

    public function edit(Passager $passager)
    {
        return view('passagers.edit', compact('passager'));
    }

    public function update(Request $request, Passager $passager)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'contact' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'adresse' => 'nullable|string|max:255', 
        ]);

        $passager->update($request->all());

        return redirect()->route('passagers.index')->with('success', 'Passager mis à jour avec succès.');
    }

    public function destroy(Passager $passager)
    {
        $passager->delete();

        return redirect()->route('passagers.index')->with('success', 'Passager supprimé avec succès.');
    }
}