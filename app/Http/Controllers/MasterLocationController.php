<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class MasterLocationController extends Controller
{
    const TCODE = "M003";

    public function list()
    {
        return view("pages.location.list");
    }

    public function formCreate(Request $request)
    {
        return view("pages.location.create");
    }

    public function formUpdate(Request $request, Location $location)
    {
        return view("pages.location.update", [
            "location" => $location
        ]);
    }

    public function deleteLocation(Request $request, Location $location)
    {
        $location->delete();
        session()->flash("fms_info", "Location deleted!");
        return back();
    }
}
