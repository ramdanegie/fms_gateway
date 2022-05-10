<?php

namespace App\Http\Controllers;

use App\Models\MasterPort;
use Illuminate\Http\Request;

class MasterPortController extends Controller
{
    const TCODE = "M010";

    public function list()
    {
        return view("pages.port.list");
    }

    public function formCreate(Request $request)
    {
        return view("pages.port.create");
    }

    public function formUpdate(Request $request, MasterPort $masterPort)
    {
        return view("pages.port.update", [
            "masterPort" => $masterPort
        ]);
    }

    public function deletePort(Request $request, MasterPort $masterPort)
    {
        $masterPort->delete();
        session()->flash("fms_info", "masterPort deleted!");
        return back();
    }
}
