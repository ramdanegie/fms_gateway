<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consignee extends Model
{
    use HasFactory;

    public function scopeMine(Builder $builder, int $user_id = null)
    {
        if(request()->user()->isAdmin()) {
            return $builder;
        }

        if(empty($user_id)) {
            $user_id = request()->user()->id;
        }

        return $builder->where("user_id", $user_id);
    }

    public function scopeSearch(Builder $builder, string $search = null)
    {
        if (empty($search)) {
            return $builder;
        }

        return $builder->where(function (Builder $sql) use ($search) {
            $sql->where("consignee_name", "like", "%{$search}%")
                ->orWhere("country", "like", "%{$search}%")
                ->orWhere("city", "like", "%{$search}%")
                ->orWhere("address", "like", "%{$search}%")
                ->orWhere("pic_name", "like", "%{$search}%")
                ->orWhere("email", "like", "%{$search}%");
        });
    }
}
