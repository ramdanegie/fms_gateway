<?php

namespace App\Http\Controllers\Internal;

use App\Http\Controllers\Controller;
use App\Models\ExportTransit;
use Illuminate\Http\Request;

class MasterExportTransitController extends Controller
{
    const TCODE = "M013";

    public function list()
    {
        return view("internal.export-transit.list");
    }

    public function formCreate(Request $request)
    {
        return view("internal.export-transit.create");
    }

    public function formImport(Request $request)
    {
        return view("internal.export-transit.import");
    }

    public function formUpdate(Request $request, ExportTransit $exportTransit)
    {
        return view("internal.export-transit.update", [
            "exportTransit" => $exportTransit
        ]);
    }

    public function deleteSchedule(Request $request, ExportTransit $exportTransit)
    {
        $exportTransit->delete();
        session()->flash("fms_info", "Schedule deleted!");
        return back();
    }
}
