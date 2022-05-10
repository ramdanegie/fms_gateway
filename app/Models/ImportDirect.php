<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportDirect extends Model
{
    use HasFactory;
    protected $casts = [
        'stf_cls'         => 'date',
        'etd_origin'      => 'date',
        'eta_destination' => 'date',
    ];
    
    protected $guarded = [];
}
