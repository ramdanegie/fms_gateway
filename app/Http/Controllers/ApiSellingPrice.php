<?php

namespace App\Http\Controllers;

use App\Models\SellingPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiSellingPrice extends Controller
{
    public function updatePrices(Request $request)
    {
        $request->validate([
            "code"       => "required",
            "quote_no"   => "required",
            "itemSevice" => "required",
            "qty"        => "required",
            "unitPrice"  => "required",
            "price"      => "required",
            "condition"  => "required",
            "itemType"   => "required",
        ]);

        $allowItemType = ["freight", "local-dest"];
        if(!in_array($request->itemType, $allowItemType)) {
            return response()->json([
                "success" => false,
                "message" => "Invalid itemType, allowed: " . implode(", ", $allowItemType)
            ], 400);
        }

        $model = SellingPrice::where([
            ["code", $request->code],
            ["quote_no", $request->quote_no],
        ]);

        if($model->count() > 0) {
            return response()->json([
                "success" => false,
                "message" => "selling price with code {$request->code} and quote {$request->quote_no} is already exists"
            ], 400);
        }

        $model             = new SellingPrice();
        $model->quote_no   = $request->quote_no;
        $model->code       = $request->code;
        $model->itemSevice = $request->itemSevice;
        $model->qty        = $request->qty;
        $model->unitPrice  = $request->unitPrice;
        $model->price      = $request->price;
        $model->condition  = $request->condition;
        $model->itemType   = $request->itemType;
        $model->payload    = json_encode($request->all());

        try {
            DB::beginTransaction();
            $model->save();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            info($th->getMessage());
            return response()->json([
                "success" => false,
                "message" => "Failed to create selling price"
            ], 400);
        }

        return response()->json([
            "success" => true,
            "message" => "Selling Price created",
            "data"    => $model
        ]);
    }
}
