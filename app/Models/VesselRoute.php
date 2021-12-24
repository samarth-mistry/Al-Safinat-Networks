<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VesselRoute extends Model
{
    use HasFactory;

    public function toport()
    {
        return $this->belongsTo(Office::class, 'to_port');
    }
    public function fromport()
    {
        return $this->belongsTo(Office::class, 'from_port');
    }
}
