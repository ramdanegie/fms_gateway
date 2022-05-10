<?php

namespace App\Http\Controllers;

use App\Models\NotifiParty;
use Illuminate\Http\Request;

class NotifiPartyController extends Controller
{
    const TCODE = "M006";

    public function list()
    {
        return view("pages.notifi-party.list");
    }

    public function formCreate(Request $request)
    {
        return view("pages.notifi-party.create");
    }

    public function formUpdate(Request $request, NotifiParty $notifiParty)
    {
        return view("pages.notifi-party.update", [
            "notifiParty" => $notifiParty
        ]);
    }

    public function deleteModel(Request $request, NotifiParty $notifiParty)
    {
        $notifiParty->delete();
        session()->flash("fms_info", "Consignee deleted!");
        return back();
    }
}
