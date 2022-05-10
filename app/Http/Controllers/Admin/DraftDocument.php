<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DraftDocument extends Controller
{
    public function listShipment(Request $request)
    {
        return view("internal.draft-document.list", [
            "page_title" => "Draft Document"
        ]);
    }
}
