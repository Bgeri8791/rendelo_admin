<?php

namespace App\Http\Controllers;

use App\Models\Visits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function index()
    {
        // Heti vizitszám (elmúlt 7 nap)
        $weeklyVisits = Visits::where('visit_date', '>=', now()->subDays(7))->count();

        // Legutóbbi vizitek (10 db)
        $recentVisits = Visits::with('patient')
            ->orderByDesc('visit_date')
            ->limit(10)
            ->get();

        // Top okok (5 db)
        $topReasons = Visits::select('reason', DB::raw('COUNT(*) as total'))
            ->groupBy('reason')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        return view('statistics.index', compact('weeklyVisits', 'recentVisits', 'topReasons'));
    }
}
