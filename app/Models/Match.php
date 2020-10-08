<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function teams()
    {
        return $this->belongsToMany('App\Models\Team', 'participations')->withPivot('goals', 'is_home');
    }

    public function getHomeTeamNameAttribute()
    {
//        dd($this->teams->filter(function ($team){ return $team->pivot->is_home === 1;}));
        return $this->teams->filter(function ($team) {
//            dd($team->pivot->match_id);
            return $team->pivot->is_home === 1;
        })->first()->name;
    }

    public function getAwayTeamNameAttribute()
    {
        return $this->teams->filter(function ($team) {
            return $team->pivot->is_home === 0;
        })->first()->name;
    }

    public function getHomeTeamGoalsAttribute()
    {
        return $this->teams->filter(function ($team) {
            return $team->pivot->is_home === 1;
        })->first()->pivot->goals;
    }

    public function getAwayTeamGoalsAttribute()
    {
        return $this->teams->filter(function ($team) {
            return $team->pivot->is_home === 0;
        })->first()->pivot->goals;
    }
}
