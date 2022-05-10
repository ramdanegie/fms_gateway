<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DirectScheduleController extends Controller
{
    const TCODE = "SC02";

    public function list()
    {
        return view("pages.lcl-direct.list-direct");
    }
}
