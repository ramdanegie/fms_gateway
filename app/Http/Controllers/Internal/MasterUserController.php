<?php

namespace App\Http\Controllers\Internal;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MasterUserController extends Controller
{
    const TCODE = "M005";

    public function list()
    {
        return view("internal.user.list");
    }

    public function formCreate(Request $request)
    {
        return view("internal.user.create");
    }

    public function formUpdate(Request $request, User $user)
    {
        return view("internal.user.update", [
            "user" => $user
        ]);
    }

    public function deleteUser(Request $request, User $user)
    {
        $user->delete();
        session()->flash("fms_info", "User deleted!");
        return back();
    }
}
