<?php

namespace App\Models;

use App\Models\Continents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public function continents()
    {
        return $this->belongsTo(Continents::class);
    }
}
