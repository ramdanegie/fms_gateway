<?php

namespace App\Http\Controllers;

use App\Helper\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $header_sql = "SELECT COUNT(DATE_FORMAT(issued_at, '%Y-%m-%d')) AS jumlah, DAYNAME(DATE_FORMAT(issued_at, '%Y-%m-%d')) AS day
        FROM full_container_loads a 
        WHERE a.issued_status = 'COMP'
        and issued_at >= ? and issued_at <= ?
        GROUP BY DATE_FORMAT(issued_at, '%Y-%m-%d'), DAYNAME(DATE_FORMAT(issued_at, '%Y-%m-%d')) ";
        $current_week = Common::getWeeks(now()->format("Y-m-d"));
        $last_week = Common::getWeeks(now()->addDays(-7)->format("Y-m-d"));
        $week_names = ["sunday", "monday", "tuesday", "wednesday", "thursday", "friday", "saturday"]; 
        $raw_current = DB::select($header_sql, [$current_week[0], now()->format("Y-m-d")]);
        $raw_last = DB::select($header_sql, [$last_week[0], now()->addDays(-7)->format("Y-m-d")]);

        $reports = [
            ['product', 'This Week', 'Last Week']
        ];
        foreach ($week_names as $key => $value) {
            $mcur = 0;
            foreach ($raw_current as $cur) {
                if(strtolower($cur->day) == $value) {
                    $mcur = $cur->jumlah;
                    break;
                }
            }

            $lcur = 0;
            foreach ($raw_last as $cur) {
                if(strtolower($cur->day) == $value) {
                    $lcur = $cur->jumlah;
                    break;
                }
            }

            $reports[] = [
                substr($value, 0, 3),
                $mcur,
                $lcur,
            ];
        }

        return view('pages.dashboard.dashboard', [
            "reports" => $reports
        ]);
    }
}
