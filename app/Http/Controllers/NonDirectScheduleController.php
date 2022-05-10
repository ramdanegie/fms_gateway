<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NonDirectScheduleController extends Controller
{
    const TCODE = "SC03";

    public function list()
    {
        return view("pages.lcl-direct.list-non-direct");
    }
}
