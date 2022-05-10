<?php

namespace App\Http\Controllers\Internal;

use App\Http\Controllers\Controller;
use App\Models\ExportDirect;
use Illuminate\Http\Request;

class MasterExportDirectController extends Controller
{
    const TCODE = "M012";

    public function list()
    {
        return view("internal.export-direct.list");
    }

    public function formCreate(Request $request)
    {
        return view("internal.export-direct.create");
    }

    public function formImport(Request $request)
    {
        return view("internal.export-direct.import");
    }

    public function formUpdate(Request $request, ExportDirect $exportDirect)
    {
        return view("internal.export-direct.update", [
            "exportDirect" => $exportDirect
        ]);
    }

    public function deleteSchedule(Request $request, ExportDirect $exportDirect)
    {
        $exportDirect->delete();
        session()->flash("fms_info", "Schedule deleted!");
        return back();
    }
}
