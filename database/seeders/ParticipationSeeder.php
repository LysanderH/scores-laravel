<?php

namespace Database\Seeders;

use App\Models\Match;
use App\Models\Participation;
use App\Models\Team;
use Illuminate\Database\Seeder;

class ParticipationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matches = Match::all();

        foreach ($matches as $match) {
            Participation::create([
                'match_id' => $match->id,
                'team_id' => Team::where('slug', substr($match->slug, 0, 3))->first()->id,
                'goals' => random_int(0, 4),
                'is_home' => true
            ]);
            Participation::create([
                'match_id' => $match->id,
                'team_id' => Team::where('slug', substr($match->slug, 4, 7))->first()->id,
                'goals' => random_int(0, 4),
                'is_home' => false
            ]);
        }
    }
}
