<?php

namespace App\Http\Controllers;

use App\Models\Shipper;
use Illuminate\Http\Request;

class ShipperController extends Controller
{
    const TCODE = "M004";

    public function list()
    {
        return view("pages.shipper.list");
    }

    public function formCreate(Request $request)
    {
        return view("pages.shipper.create");
    }

    public function formUpdate(Request $request, Shipper $shipper)
    {
        return view("pages.shipper.update", [
            "shipper" => $shipper
        ]);
    }

    public function deleteModel(Request $request, Shipper $shipper)
    {
        $shipper->delete();
        session()->flash("fms_info", "Shipper deleted!");
        return back();
    }
}
