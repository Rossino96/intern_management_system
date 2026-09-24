<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stage;
use App\Models\Rapport;
use Illuminate\Support\Facades\Storage;

class RapportController extends Controller
{
    public function create(Stage $stage)
    {
        // Seuls les stages terminés peuvent recevoir un rapport
        if ($stage->statut !== 'Terminé') {
            abort(403);
        }

        // Un seul rapport par stage
        if ($stage->rapport) {
            return redirect()
                ->route('stages.index')
                ->with('error', 'Ce stage possède déjà un rapport.');
        }

        return view('rapports.create', compact('stage'));
    }

    public function store(Request $request, Stage $stage)
    {
        // Le stage doit être terminé
        if ($stage->statut !== 'Terminé') {
            abort(403);
        }

        // Vérifier qu'il n'existe pas déjà un rapport
        if ($stage->rapport) {
            return redirect()
                ->route('stages.index')
                ->with('error', 'Ce stage possède déjà un rapport.');
        }

        $request->validate([
            'fichier' => 'required|file|mimes:pdf|max:10240',
        ]);

        $fichier = $request->file('fichier')->store(
            'rapports',
            'public'
        );

        Rapport::create([
            'stage_id' => $stage->id,
            'fichier' => $fichier,
        ]);

        return redirect()
            ->route('stages.index')
            ->with('success', 'Rapport ajouté avec succès.');
    }

    public function edit(Rapport $rapport)
    {
        return view('rapports.edit', compact('rapport'));
    }

    public function update(Request $request, Rapport $rapport)
    {
        $request->validate([
            'fichier' => 'required|file|mimes:pdf|max:10240',
        ]);

        $ancienFichier = $rapport->fichier;

        $nouveauFichier = $request->file('fichier')->store(
            'rapports',
            'public'
        );

        $rapport->update([
            'fichier' => $nouveauFichier,
        ]);

        // Supprimer l'ancien PDF
        if ($ancienFichier && Storage::disk('public')->exists($ancienFichier)) {
            Storage::disk('public')->delete($ancienFichier);
        }

        return redirect()
            ->route('stages.index', $rapport->stage_id)
            ->with('success', 'Rapport modifié avec succès.');
    }

    public function show(Rapport $rapport)
    {
        $chemin = storage_path(
            'app/public/' . $rapport->fichier
        );

        if (!file_exists($chemin)) {
            abort(404);
        }

        return response()->file($chemin);
    }
}