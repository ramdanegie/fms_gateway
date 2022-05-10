<?php

namespace App\Http\Controllers\Internal;

use App\Http\Controllers\Controller;
use App\Models\SizeContainer;
use Illuminate\Http\Request;

class MasterSizeContainerController extends Controller
{
    const TCODE = "M006";

    public function list()
    {
        return view("internal.size-container.list");
    }

    public function formCreate(Request $request)
    {
        return view("internal.size-container.create");
    }

    public function formUpdate(Request $request, SizeContainer $sizeContainer)
    {
        return view("internal.size-container.update", [
            "sizeContainer" => $sizeContainer
        ]);
    }

    public function deleteSize(Request $request, SizeContainer $sizeContainer)
    {
        $sizeContainer->delete();
        session()->flash("fms_info", "Size container deleted!");
        return back();
    }
}
