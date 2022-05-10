<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depot extends Model
{
    use HasFactory;

    public function scopeMine(Builder $builder, int $user_id = null)
    {
        return $builder;
    }

    public function scopeSearch(Builder $builder, string $search = null)
    {
        if (empty($search)) {
            return $builder;
        }

        return $builder->where(function (Builder $sql) use ($search) {
            $sql->where("name", "like", "%{$search}%")
                ->orWhere("city", "like", "%{$search}%")
                ->orWhere("address", "like", "%{$search}%");
        });
    }
}
