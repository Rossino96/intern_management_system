<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
    protected $fillable = [
        'stage_id',
        'fichier',
    ];

    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }
}