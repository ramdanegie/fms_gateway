<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FullContainerLoad as Fcl;
use Illuminate\Http\Request;

class FullContainerLoad extends Controller
{
    public function list(Request $request)
    {
        return view("internal.fcl.list", [
            "form_page" => $request->form_page
        ]);
    }

    public function detail(Request $request)
    {
        return view("internal.fcl.detail");
    }

    public function detailShipment(Request $request, Fcl $fcl)
    {
        return view("internal.fcl.shipping-detail", [
            "quote_type" => $fcl->quote_type,
            "fcl"        => $fcl,
            "page"       => "page-2",
            "title"      => (isset(config("quotation_types")[$fcl->quote_type]) ? config("quotation_types")[$fcl->quote_type] : $fcl->quote_type) . " - Shipping Detail"
        ]);
    }

    public function shippingInstrction(Request $request, Fcl $fcl)
    {
        return view("internal.fcl.shipping-instrction", [
            "quote_type" => $fcl->quote_type,
            "fcl"        => $fcl,
            "page"       => "page-2",
            "title"      => (isset(config("quotation_types")[$fcl->quote_type]) ? config("quotation_types")[$fcl->quote_type] : $fcl->quote_type) . " - Shipping Detail"
        ]);
    }

    public function rejection(Request $request, \App\Models\FullContainerLoad $fullContainerLoad)
    {
        $allow = ["GET", "POST"];
        if(!in_array($request->getMethod(), $allow)) {
            return abort(404);
        }

        if($request->getMethod() == "GET") {
            return view("internal.fcl.rejection", [
                "fcl" => $fullContainerLoad
            ]);
        }

        $fullContainerLoad->issued_reason = $request->issued_reason;
        $fullContainerLoad->issued_status = \App\Models\FullContainerLoad::REJECT;
        $fullContainerLoad->issued_at = now();
        $fullContainerLoad->save();

        return redirect()->route("internal.fcl_rejection", [$fullContainerLoad->id, "read_only" => 1]);
    }
}
