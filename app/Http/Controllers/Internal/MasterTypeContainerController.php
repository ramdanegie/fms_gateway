<?php

namespace App\Http\Controllers\Internal;

use App\Http\Controllers\Controller;
use App\Models\TypeContainer;
use Illuminate\Http\Request;

class MasterTypeContainerController extends Controller
{
    const TCODE = "M007";

    public function list()
    {
        return view("internal.type-container.list");
    }

    public function formCreate(Request $request)
    {
        return view("internal.type-container.create");
    }

    public function formUpdate(Request $request, TypeContainer $typeContainer)
    {
        return view("internal.type-container.update", [
            "typeContainer" => $typeContainer
        ]);
    }

    public function deleteType(Request $request, TypeContainer $typeContainer)
    {
        $typeContainer->delete();
        session()->flash("fms_info", "Size container deleted!");
        return back();
    }
}
