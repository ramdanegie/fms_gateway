<?php
namespace App\Http\Controllers\Internal;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class MasterTeamController extends Controller
{
    const TCODE = "M004";

    public function list()
    {
        return view("internal.team.list");
    }

    public function deleteTeam(Request $request, Team $team)
    {
        $team->delete();
        session()->flash("fms_info", "Team deleted!");
        return back();
    }

    public function formCreate(Request $request)
    {
        return view("internal.team.create");
    }

    public function formUpdate(Request $request, Team $team)
    {
        return view("internal.team.update", [
            "team" => $team
        ]);
    }

    public function roleTeam(Request $request, Team $team)
    {
        return view("internal.team.role-setting", [
            "team"  => $team,
            "menus" => config("menus")
        ]);
    }
}
