<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\Office;

class Booking extends Model
{
    use HasFactory;

    public function sourceCountry()
    {
        return $this->belongsTo(Country::class, 'source_country_id');
    }

    public function destinationCountry()
    {
        return $this->belongsTo(Country::class, 'destination_country_id');
    }

    public function sourcePort()
    {
        return $this->belongsTo(Office::class, 'source_port_id');
    }

    public function destinationPort()
    {
        return $this->belongsTo(Office::class, 'destination_port_id');
    }
}
