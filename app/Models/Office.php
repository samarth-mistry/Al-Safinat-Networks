<?php

namespace App\Models;

use App\Models\Country;
use App\Models\VesselRoute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    // public function to_route()
    // {
    //     return $this->hasMany(VesselRoute::class, "to_port");
    // }
}
