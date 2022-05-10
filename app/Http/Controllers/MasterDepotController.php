<?php
namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Depot;
use Illuminate\Http\Request;

class MasterDepotController extends Controller
{
    const TCODE = "M008";

    public function list()
    {
        return view("pages.depot.list");
    }

    public function formCreate(Request $request)
    {
        return view("pages.depot.create");
    }

    public function formUpdate(Request $request, Depot $depot)
    {
        return view("pages.depot.update", [
            "depot" => $depot
        ]);
    }

    public function deleteDepot(Request $request, Depot $depot)
    {
        $depot->delete();
        session()->flash("fms_info", "Depo has been Deleted");
        return back();
    }
}
