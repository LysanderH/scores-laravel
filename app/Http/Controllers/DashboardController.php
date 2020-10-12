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
        $matches = Match::with('teams')->orderByDesc('played_at')->simplePaginate(10)->fragment('matches');

        switch (\request()->get('s')) {
            case 'team':
                $stats = Stat::with('team')->get()->sortBy('team.name');
                break;
            case 'teamAsc':
                $stats = Stat::with('team')->get()->sortByDesc('team.name');
                break;
            case 'games':
                $stats = Stat::with('team')->orderByRaw('games DESC, points DESC, goals_difference DESC')->get();
                break;
            case 'gamesAsc':
                $stats = Stat::with('team')->orderByRaw('games ASC, points DESC, goals_difference DESC')->get();
                break;
            case 'points':
                $stats = Stat::with('team')->orderByRaw('points DESC, goals_difference DESC, games ASC')->get();
                break;
            case 'pointsAsc':
                $stats = Stat::with('team')->orderByRaw('points ASC, goals_difference DESC, games ASC')->get();
                break;
            case 'wins':
                $stats = Stat::with('team')->orderByRaw('wins DESC, points DESC, games ASC, goals_difference DESC')->get();
                break;
            case 'winsAsc':
                $stats = Stat::with('team')->orderByRaw('wins ASC, points DESC, games ASC, goals_difference DESC')->get();
                break;
        }

//        if (isset($_GET['sortStandings'])) {
//            $stats = Stat::with('team')->get()->sortBy($_GET['sortStandings']);
//        } else {
//            $stats = Stat::with('team')->get()->sortByDesc('points');
//        }
        return view('dashboard', compact(['teams', 'matches', 'stats']));
    }
}
