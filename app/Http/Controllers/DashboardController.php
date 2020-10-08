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

        $teams = Team::with('matches')->get()->sortBy('name');
        $matches = Match::with('teams')->get();
        if (isset($_GET['sortStandings'])){
            $stats = Stat::with('team')->get()->sortBy($_GET['sortStandings']);
        } else {
            $stats = Stat::with('team')->get()->sortByDesc('points');
        }
        return view('dashboard', compact(['teams', 'matches', 'stats']));
    }
}
