<?php

namespace App\Listeners;

use App\Events\MatchCreated;
use App\Http\Controllers\MatchController;
use App\Models\Stat;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateTeamStats
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle(MatchCreated $event)
    {
        $match = $event->match;
//        check if stats exists???
        foreach ($match->teams as $index => $team) {
            $statsForTeam = Stat::where('team_id', $team->id)->first();
            $statsForTeam->games++;
            if ($team->homeMatch($match)) {
                $statsForTeam->goals_for += $match->home_team_goals;
                $statsForTeam->goals_against += $match->away_team_goals;
            } else {
                $statsForTeam->goals_for += $match->away_team_goals;
                $statsForTeam->goals_against += $match->home_team_goals;
            }
            $statsForTeam->goals_difference = $statsForTeam->goals_for - $statsForTeam->goals_against;

            if ($index === 0) {
                if ($team->goalsMadeInMatch($match) > $match->teams[1]->goalsMadeInMatch($match)) {
                    $statsForTeam->wins += 1;
                    $statsForTeam->points += 3;
                } elseif ($team->goalsMadeInMatch($match) < $match->teams[1]->goalsMadeInMatch($match)) {
                    $statsForTeam->losses += 1;
                } else {
                    $statsForTeam->draws += 1;
                    $statsForTeam->points += 1;
                }
            } else {
                if ($team->goalsMadeInMatch($match) > $match->teams[0]->goalsMadeInMatch($match)) {
                    $statsForTeam->wins += 1;
                    $statsForTeam->points += 3;
                } elseif ($team->goalsMadeInMatch($match) < $match->teams[0]->goalsMadeInMatch($match)) {
                    $statsForTeam->losses += 1;
                } else {
                    $statsForTeam->draws += 1;
                    $statsForTeam->points += 1;
                }
            }
            $statsForTeam->save();
        }
    }
}
