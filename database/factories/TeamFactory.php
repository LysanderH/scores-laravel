<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

use Faker\Generator as Faker;
use Illuminate\Support\Collection;

class TeamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Team::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'FC ' . $this->faker->name,
            'slug' => $this->faker->slug,
            'file_name' => $this->faker->imageUrl(),
        ];
    }
}
