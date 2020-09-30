<?php

namespace Database\Seeders;

use App\Models\Match;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slugs = DB::table('teams')->select('slug')->get();
        $startDate = now()->subMonths(10);

        foreach ($slugs as $homeTeamSlug) {
            foreach ($slugs as $awayTeamSlug) {
                $startDate->addDays(3);
                if ($homeTeamSlug->slug !== $awayTeamSlug->slug) {
                    $matchSlug = $homeTeamSlug->slug . '-' . $awayTeamSlug->slug;
                    Match::create([
                        'played_at' => $startDate,
                        'slug' => $matchSlug
                    ]);
                }
            }
        }
    }
}
