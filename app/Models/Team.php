<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $withCount = ['matches'];

    protected $fillable = [
        'slug',
        'date',
        'file_name',
        'name'
    ];

    public function matches()
    {
        return $this->belongsToMany('App\Models\Match', 'participations')->withPivot('goals', 'is_home');
    }

    public function setSlugAttribute($val)
    {
        $this->attributes['slug'] = strtoupper($val);
    }

    public function homeMatch(Match $match)
    {
        return $this->matches->filter(function ($m) use ($match) {
            return $m->is($match);
        })->first()->pivot->is_home;
    }

    public function goalsMadeInMatch(Match $match)
    {
        return $this->matches->filter(function ($m) use ($match) {
            return $m->is($match);
        })->first()->pivot->goals;
    }

    public function getGoalsForAttribute()
    {
        return $this->matches->sum(function ($match) {
            return $match->pivot->goals;
        });
    }

    public function getGoalsAgainstAttribute()
    {
        $matchesWithAllOpponents = $this->matches->load([
            'teams' => function ($query) {
                return $query->where('teams.id', '!=', $this->id);
            }
        ]);

        return $matchesWithAllOpponents->sum(function ($match) {
            return $match->teams->first()->pivot->goals;
        });
    }

    public function getGoalsDifferenceAttribute()
    {
        return $this->getGoalsForAttribute() - $this->getGoalsAgainstAttribute();
    }

    public function getPointsAttribute()
    {
        return $this->wins * 3 + $this->draws;
    }

    public function getWinsAttribute()
    {
        $victories = 0;
        $currentTeamGoals = 0;
        $opponentTeamGoals = 0;

        $matches = $this->matches;

        foreach ($matches as $match) {
            if ($match->teams[0]->id === $this->id) {
                $currentTeamGoals = $match->teams[0]->pivot->goals;
                $opponentTeamGoals = $match->teams[1]->pivot->goals;
            } else {
                $opponentTeamGoals = $match->teams[0]->pivot->goals;
                $currentTeamGoals = $match->teams[1]->pivot->goals;
            }

            if ($currentTeamGoals > $opponentTeamGoals) {
                $victories++;
            }
        }
        return $victories;
    }

    public function getDrawsAttribute()
    {
        $draws = 0;
        $matches = $this->matches;

        foreach ($matches as $match) {
            if ($match->teams[0]->pivot->goals === $match->teams[1]->pivot->goals) {
                $draws++;
            }
        }
        return $draws;
    }

    public function getLossesAttribute()
    {
        $losses = 0;
        $currentTeamGoals = 0;
        $opponentTeamGoals = 0;

        $matches = $this->matches;

        foreach ($matches as $match) {
            if ($match->teams[0]->id === $this->id) {
                $currentTeamGoals = $match->teams[0]->pivot->goals;
                $opponentTeamGoals = $match->teams[1]->pivot->goals;
            } else {
                $opponentTeamGoals = $match->teams[0]->pivot->goals;
                $currentTeamGoals = $match->teams[1]->pivot->goals;
            }

            if ($currentTeamGoals < $opponentTeamGoals) {
                $losses++;
            }
        }
        return $losses;
    }
}
