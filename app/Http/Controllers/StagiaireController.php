<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stagiaire;


class StagiaireController extends Controller

{
    public function index()
    {
        $stagiaires = Stagiaire::all();

        return view('stagiaires.index', compact('stagiaires'));
    }


    public function create()
    {
        return view('stagiaires.create'); 
    }


    public function store(Request $request)
    {
        $stagiaire = new Stagiaire();

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

        return redirect('/stagiaires');
    }

    public function update(Request $request, Stagiaire $stagiaire)
    {
        $stagiaire->nom = $request->nom;
        $stagiaire->prenom = $request->prenom;

        $stagiaire->save();

        return redirect('/stagiaires');
    }


    public function edit($id)
    {
        $stagiaire = Stagiaire::find($id);

        return view('stagiaires.edit', compact('stagiaire'));
    }
}
