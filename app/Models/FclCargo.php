<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FclCargo extends Model
{
    use HasFactory;

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, "cargo_id");
    }
}
