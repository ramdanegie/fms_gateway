<?php

namespace App\Http\Controllers\Internal;

use App\Http\Controllers\Controller;
use App\Models\Tracking;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    const TCODE = "TR01";

    public function list()
    {
        return view("internal.tracking.list");
    }

    public function formUpdate(Request $request, Tracking $tracking)
    {
        return view("internal.tracking.update", [
            "tracking" => $tracking
        ]);
    }

    public function deleteBanner(Request $request, Tracking $tracking)
    {
        $tracking->delete();
        session()->flash("fms_info", "Tracking deleted!");
        return back();
    }
}
