<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sequence extends Model
{
    use HasFactory;
    const TYPE_QUOTE    = "QN";
    const TYPE_SHIPMENT = "SN";

    public static function getSequence(string $type)
    {
        $pad_length    = 4;
        $next_sequence = "";
        $prefix        = "{$type}-" . now()->format("dmY") . "-";
        try {
            DB::beginTransaction();
            $check = Sequence::where("prefix", $prefix);
            if ($check->count() == 0) {
                $model = new Sequence();
                $model->prefix = $prefix;
                $model->counter = 1;
                $model->saveOrFail();
            } else {
                $model = $check->first();
                $model->prefix  = $prefix;
                $model->counter = $model->counter + 1;
                $model->saveOrFail();
            }

            $next_sequence = $model->prefix . str_pad($model->counter, $pad_length, "0", STR_PAD_LEFT);
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }

        return $next_sequence;
    }
}
