<?php

namespace App\Http\Controllers;

use App\Models\FullContainerLoad;
use App\Models\InvoicingHistory;
use Illuminate\Http\Request;

class InvoicingController extends Controller
{
    public function list(Request $request)
    {
        return view("pages.invoicing.list", [
            "page_title" => "Invoicing"
        ]);  
    }

    public function listHistory(Request $request, FullContainerLoad $fcl)
    {
        $items = InvoicingHistory::where("fcl_id", $fcl->id)->get();
        return view("pages.invoicing.history", [
            "items" => $items
        ]);
    }
}
