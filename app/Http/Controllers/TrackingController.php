<?php

namespace App\Http\Controllers;

use App\Client\Portcast;
use App\Models\Tracking;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function trackingHandler(Request $request)
    {
        $items = [];
        if (!empty($request->shipment_no) && $request->number_type == "S") {
            $items = Tracking::whereHas("trackingable", function (Builder $builder) use ($request) {
                $builder->where("shipment_no", $request->shipment_no)
                    ->orWhere("quote_no", $request->shipment_no);
            })->orderBy("shipment_date", "desc")->get();
        }

        $error = "";
        if (!empty($request->shipment_no) && $request->number_type == "C") {
            $portcast = Portcast::getInstance();
            $items = $portcast->getListContainer($error, $request->shipment_no);
            if(count($items->obj_list) > 0) {
                $items = $items->obj_list[0];
            } else {
                $items = [];
            }
        }

        return view("pages.tracking.index", [
            "tracking_datas" => $items,
            "number_type" => $request->number_type,
            "error" => $error
        ]);
    }
}
