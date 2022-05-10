<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function settingPage(Request $request)
    {
        return view("pages.profile.setting", [
            "user" => $request->user()
        ]);
    }
}
