<?php

namespace App\Console\Commands;

use App\Models\Stage;
use Illuminate\Console\Command;

class UpdateExpiredStages extends Command
{
    protected $signature = 'stages:update-expired';

    protected $description = 'Passe automatiquement les stages arrivés à échéance au statut terminé';

    public function handle()
    {
        $nombre = Stage::where('statut', 'en_cours')
            ->whereDate('date_fin', '<', today())
            ->update([
                'statut' => 'termine',
            ]);

        $this->info($nombre . ' stage(s) passé(s) automatiquement à terminé.');

        return Command::SUCCESS;
    }
}