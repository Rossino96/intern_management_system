<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stage;
use App\Models\Stagiaire;
use App\Models\Service;

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

        return view('stages.create', compact('stagiaires', 'services'));
    }


    public function store(Request $request)
    {
        
        $stage = new Stage();
        
        $request->validate([
            'date_debut'=>'required',
            'date_fin'=>'required',
            'statut'=>'required',
            'theme'=>'required',
            'stagiaire_id' => 'required',
            'service_id' => 'required',
            ]);

            
            $stage->date_debut = $request->date_debut;
            $stage->date_fin = $request->date_fin;
            $stage->statut = $request->statut;
            $stage->theme = $request->theme;
            $stage->stagiaire_id = $request->stagiaire_id;
            $stage->service_id = $request->service_id;

        $stage->save();

        return redirect('/stages');
    }


    public function edit($id)
    {
        $stage = Stage::find($id);
        $stagiaires = Stagiaire::all();
        $services = Service::all();

        return view('stages.edit', compact('stage', 'stagiaires', 'services'));
    }


    public function update(Request $request, Stage $stage)
    {
        $request->validate([
            'stagiaire_id' => 'required',
            'service_id' => 'required',
            'date_debut'=>'required',
            'date_fin'=>'required',
            'statut'=>'required',
            'theme'=>'required',
        ]);

        $stage->stagiaire_id = $request->stagiaire_id;
        $stage->service_id = $request->service_id;
        $stage->date_debut = $request->date_debut;
        $stage->date_fin = $request->date_fin;
        $stage->statut = $request->statut;
        $stage->theme = $request->theme;

        $stage->save();

        return redirect('/stages');
    }


    public function destroy(Stage $stage)
    {
        $stage->delete();

        return redirect('/stages');
    }
}
