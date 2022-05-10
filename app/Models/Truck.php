<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;
    
    public function scopeMine(Builder $builder, int $user_id = null)
    {
        return $builder;
    }

    public function scopeOnlyType(Builder $builder, string $type)
    {
        return $builder->whereRaw("lower(type) = ?", strtolower($type));
    }
}
