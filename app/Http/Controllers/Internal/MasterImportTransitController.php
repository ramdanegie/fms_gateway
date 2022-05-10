<?php

namespace App\Http\Controllers\Internal;

use App\Http\Controllers\Controller;
use App\Models\ImportTransit;
use Illuminate\Http\Request;

class MasterImportTransitController extends Controller
{
    const TCODE = "M011";

    public function list()
    {
        return view("internal.import-transit.list");
    }

    public function formCreate(Request $request)
    {
        return view("internal.import-transit.create");
    }

    public function formImport(Request $request)
    {
        return view("internal.import-transit.import");
    }

    public function formUpdate(Request $request, ImportTransit $importTransit)
    {
        return view("internal.import-transit.update", [
            "importTransit" => $importTransit
        ]);
    }

    public function deleteSchedule(Request $request, ImportTransit $importTransit)
    {
        $importTransit->delete();
        session()->flash("fms_info", "Schedule deleted!");
        return back();
    }
}
