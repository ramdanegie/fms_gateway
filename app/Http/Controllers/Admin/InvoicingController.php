<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FclInvoicing;
use App\Models\FullContainerLoad as Fcl;
use Illuminate\Http\Request;

class InvoicingController extends Controller
{
    public function listShipment(Request $request)
    {
        return view("internal.invoicing.list", [
            "page_title" => "Invoicing"
        ]);
    }

    public function setInvoiceStatus(Request $request, Fcl $fcl, string $status)
    {
        $invoice = FclInvoicing::where("fcl_id", $fcl->id)->firstOrFail();
        $invoice->status_flag = strtoupper($status);
        $invoice->save();

        return back()->with("fms_info", "Marked as {$status}");
    }
}
