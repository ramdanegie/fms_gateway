<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Truck;
use Illuminate\Http\Request;

class MasterTruckController extends Controller
{
    const TCODE = "M009";

    public function list()
    {
        return view("pages.truck.list");
    }

    public function formCreate(Request $request)
    {
        return view("pages.truck.create");
    }

    public function formUpdate(Request $request, Truck $truck)
    {
        return view("pages.truck.update", [
            "truck" => $truck
        ]);
    }

    public function deleteDepot(Request $request, Truck $truck)
    {
        $truck->delete();
        session()->flash("fms_info", "Truck deleted!");
        return back();
    }
}
