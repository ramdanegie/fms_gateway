<?php

namespace App\Http\Controllers;

use App\Models\Consignee;
use Illuminate\Http\Request;

class ConsigneeController extends Controller
{
    const TCODE = "M005";

    public function list()
    {
        return view("pages.consignee.list");
    }

    public function formCreate(Request $request)
    {
        return view("pages.consignee.create");
    }

    public function formUpdate(Request $request, Consignee $consignee)
    {
        return view("pages.consignee.update", [
            "consignee" => $consignee
        ]);
    }

    public function deleteModel(Request $request, Consignee $consignee)
    {
        $consignee->delete();
        session()->flash("fms_info", "Consignee deleted!");
        return back();
    }
}
