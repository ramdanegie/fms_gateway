<?php

namespace App\Http\Controllers\Internal;

use App\Http\Controllers\Controller;
use App\Models\ImportDirect;
use Illuminate\Http\Request;

class MasterImportDirectController extends Controller
{
    const TCODE = "M010";

    public function list()
    {
        return view("internal.import-direct.list");
    }

    public function formCreate(Request $request)
    {
        return view("internal.import-direct.create");
    }

    public function formImport(Request $request)
    {
        return view("internal.import-direct.import");
    }

    public function formUpdate(Request $request, ImportDirect $importDirect)
    {
        return view("internal.import-direct.update", [
            "importDirect" => $importDirect
        ]);
    }

    public function deleteSchedule(Request $request, ImportDirect $importDirect)
    {
        $importDirect->delete();
        session()->flash("fms_info", "Schedule deleted!");
        return back();
    }
}
