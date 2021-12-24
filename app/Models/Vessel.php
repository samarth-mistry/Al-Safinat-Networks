<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Batch;

class Vessel extends Model
{
    use HasFactory;

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
}
