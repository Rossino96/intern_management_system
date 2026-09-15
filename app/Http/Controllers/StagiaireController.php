<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stagiaire;
use App\Models\Stage;
use App\Models\Service;


class StagiaireController extends Controller

{
    public function index()
    {
        $stagiaires = Stagiaire::withCount('stages')->get();

        return view('stagiaires.index', compact('stagiaires'));
    }


    public function create()
    {
        return view('stagiaires.create'); 
    }


    public function store(Request $request)
    {
        $stagiaire = new Stagiaire();

        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'sexe' => 'required',
            'date_naissance' => 'required',
            'telephone' => 'required',
            'email' => 'required|email',
            'adresse' => 'required',
            'etablissement' => 'required',
            'filiere' => 'required',
            'niveau' => 'required',
        ]);

        $stagiaire->nom = $request->nom;
        $stagiaire->prenom = $request->prenom;
        $stagiaire->sexe = $request->sexe;
        $stagiaire->date_naissance = $request->date_naissance;
        $stagiaire->telephone= $request->telephone;
        $stagiaire->email = $request->email;
        $stagiaire->adresse = $request->adresse;
        $stagiaire->etablissement = $request->etablissement;
        $stagiaire->filiere = $request->filiere;
        $stagiaire->niveau = $request->niveau;

        $stagiaire->save();

        return redirect()
            ->route('stagiaires.index')
            ->with('success', 'Stagiaire ajouté avec succès.');
    }

    public function update(Request $request, Stagiaire $stagiaire)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'sexe' => 'required',
            'date_naissance' => 'required',
            'telephone' => 'required',
            'email' => 'required|email',
            'adresse' => 'required',
            'etablissement' => 'required',
            'filiere' => 'required',
            'niveau' => 'required',
        ]);

        $stagiaire->nom = $request->nom;
        $stagiaire->prenom = $request->prenom;
        $stagiaire->sexe = $request->sexe;
        $stagiaire->date_naissance = $request->date_naissance;
        $stagiaire->telephone = $request->telephone;
        $stagiaire->email = $request->email;
        $stagiaire->adresse = $request->adresse;
        $stagiaire->etablissement = $request->etablissement;
        $stagiaire->filiere = $request->filiere;
        $stagiaire->niveau = $request->niveau;

        if ($stagiaire->isDirty()) {
            $stagiaire->save();

                return redirect()
                    ->route('stagiaires.index')
                    ->with('success', 'Stagiaire modifié avec succès.');
            }

            return redirect()
                ->route('stagiaires.index')
                ->with('error', 'Aucune modification effectuée.');
    }


    public function edit($id)
    {
        $stagiaire = Stagiaire::find($id);

        return view('stagiaires.edit', compact('stagiaire'));
    }

    public function destroy(Stagiaire $stagiaire)
    {
        $stagiaire->delete();

        return redirect()
            ->route('stagiaires.index')
            ->with('success', 'Stagiaire supprimé avec succès.');
    }

    public function show(Stagiaire $stagiaire)
    {
        $stagiaire->load('stages.service', 'stages.encadrant');
        
        return view('stagiaires.show', compact('stagiaire'));
    }
}
