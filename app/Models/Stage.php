<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;


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

    public function encadrant()
{
    return $this->belongsTo(User::class, 'encadrant_id');
}
}
