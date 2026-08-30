<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Stage;

class Service extends Model
{
    public function stages()
    {
        return $this->hasMany(Stage::class);
    }
}