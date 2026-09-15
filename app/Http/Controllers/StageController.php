<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stage;
use App\Models\Stagiaire;
use App\Models\Service;
use App\Models\User;

class StageController extends Controller
{
    public function index()
    {
        $stages = Stage::all();

        return view('stages.index',compact('stages'));
    }


    public function create()
    {
        $stagiaires = Stagiaire::all();
        $services = Service::all();
        $encadrants = User::where('role', 'encadrant')->get();

        return view('stages.create', compact(
            'stagiaires', 
            'services',
            'encadrants'
        ));
    }


    public function store(Request $request)
    {
        
        $stage = new Stage();
        
        $request->validate([
            'stagiaire_id' => 'required',
            'service_id' => 'required',
            'encadrant_id' => 'required|exists:users,id',
            'date_debut'=>'required',
            'date_fin'=>'required',
            'statut' => 'required|in:À venir,En cours,Terminé',
            'theme'=>'required',
            ]);

            
            $stage->stagiaire_id = $request->stagiaire_id;
            $stage->service_id = $request->service_id;
            $stage->encadrant_id = $request->encadrant_id;
            $stage->date_debut = $request->date_debut;
            $stage->date_fin = $request->date_fin;
            $stage->statut = $request->statut;
            $stage->theme = $request->theme;

        $stage->save();

        return redirect()
            ->route('stages.index')
            ->with('success', 'Stage ajouté avec succès.');
    }


    public function edit($id)
    {
        $stage = Stage::find($id);
           if (
            auth()->user()->role === 'encadrant' &&
            $stage->encadrant_id !== auth()->user()->id
        ) {
            abort(403);
        }
        $stagiaires = Stagiaire::all();
        $services = Service::all();
        $encadrants = User::where('role', 'encadrant')->get();

        return view('stages.edit', compact(
            'stage', 
            'stagiaires', 
            'encadrants',
            'services'));
    }


    public function update(Request $request, Stage $stage)
    {
        $request->validate([
            'stagiaire_id' => 'required',
            'service_id' => 'required',
            'encadrant_id' => 'required|exists:users,id',
            'date_debut'=>'required',
            'date_fin'=>'required',
            'statut' => 'required|in:À venir,En cours,Terminé',
            'theme'=>'required',
        ]);
        if (
            auth()->user()->role === 'encadrant' &&
            $stage->encadrant_id !== auth()->user()->id
        ) {
            abort(403);
        }

        $stage->stagiaire_id = $request->stagiaire_id;
        $stage->service_id = $request->service_id;
        if (in_array(auth()->user()->role, ['admin', 'rh'])) 
            {
                $stage->encadrant_id = $request->encadrant_id;
            }
        $stage->date_debut = $request->date_debut;
        $stage->date_fin = $request->date_fin;
        $stage->statut = $request->statut;
        $stage->theme = $request->theme;

        if ($stage->isDirty()) {
            $stage->save();

                return redirect()
                    ->route('stages.index')
                    ->with('success', 'Stagiaire modifié avec succès.');
            }

            return redirect()
                ->route('stages.index')
                ->with('error', 'Aucune modification effectuée.');
    }


    public function destroy(Stage $stage)
    {
        if (
            auth()->user()->role === 'encadrant' &&
            $stage->encadrant_id !== auth()->user()->id
        ) {
            abort(403);
        }

        $stage->delete();

        return redirect()
            ->route('stages.index')
            ->with('success', 'Stage supprimé avec succès.');
    }
}
