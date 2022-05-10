<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class MasterCargoController extends Controller
{
    const TCODE = "M002";

    public function list()
    {
        return view("pages.cargo.list");
    }

    public function formCreate(Request $request)
    {
        return view("pages.cargo.create");
    }

    public function formUpdate(Request $request, Cargo $cargo)
    {
        return view("pages.cargo.update", [
            "cargo" => $cargo
        ]);
    }

    public function deleteCargo(Request $request, Cargo $cargo)
    {
        $cargo->delete();
        session()->flash("fms_info", "Cargo has been Deleted");
        return back();
    }
}
