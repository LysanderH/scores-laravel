<?php

namespace Database\Factories;

use App\Models\Match;
use App\Models\Participation;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParticipationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Participation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'team_id' => Team::factory(),
            'match_id' => Match::factory(),
            'goals' => $this->faker->numberBetween(0, 20),
            'is_home'=> $this->faker->boolean
        ];
    }
}
