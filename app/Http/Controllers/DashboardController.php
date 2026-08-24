<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Stagiaire;

use App\Models\Stage;

use App\Models\Service;

use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{

    public function index()
    {
        $totalStagiaires = Stagiaire::count();
        $totalStages = Stage::count();
        $totalServices = Service::count();
        $stagesEnCours = Stage::where('statut', 'en_cours')->count();
        $stagesTermines = Stage::where('statut', 'termine')->count();

        $repartitionParService = DB::table('services')
            ->leftJoin('stages', 'services.id', '=', 'stages.service_id')
            ->select(
                'services.nom',
                DB::raw('COUNT(DISTINCT stages.stagiaire_id) as stagiaires_count')
            )
            ->groupBy('services.id', 'services.nom')
            ->get();
    

        return view('dashboard.index', compact(
            'totalStagiaires',
            'totalStages',  
            'totalServices',
            'stagesEnCours',
            'stagesTermines',
            'repartitionParService'
        ));
    }
}
