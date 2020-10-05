<?php

namespace App\Http\Controllers;

use App\Models\Match;
use App\Models\Stat;
use App\Models\Team;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $teams = Team::all()->sortBy('name');
        $matches = Match::all();
        $stats = Stat::all()->sortByDesc('points');
        return view('dashboard', compact(['teams', 'matches', 'stats']));
    }
}
