<?php

namespace Database\Seeders;

use App\Models\Stat;
use App\Models\Team;
use Illuminate\Database\Seeder;

class StatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = Team::with('matches.teams')->get();

        foreach ($teams as $team) {
            Stat::create([
                'team_id'=> $team->id,
                'games'=> $team->matches_count,
                'points'=> $team->points,
                'wins'=> $team->wins,
                'draws'=> $team->draws,
                'losses'=> $team->losses,
                'goals_for'=> $team->goals_for,
                'goals_against'=> $team->goals_against,
                'goals_difference'=> $team->goals_difference,
            ]);
        }
    }
}
