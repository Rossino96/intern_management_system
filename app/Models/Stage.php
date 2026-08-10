<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    public function Stagiaire()
    {
        return $this->belongsTo(Stagiaire::class);
    }
    public function Service()
    {
        return $this->belongsTo(Service::class);
    }
}
