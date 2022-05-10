<?php

namespace App\Http\Controllers\Internal;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    const TCODE = "M014";

    public function list()
    {
        return view("internal.banner.list");
    }

    public function formCreate(Request $request)
    {
        return view("internal.banner.create");
    }

    public function formUpdate(Request $request, Banner $banner)
    {
        return view("internal.banner.update", [
            "banner" => $banner
        ]);
    }

    public function deleteBanner(Request $request, Banner $banner)
    {
        $banner->delete();
        session()->flash("fms_info", "Banner deleted!");
        return back();
    }
}
