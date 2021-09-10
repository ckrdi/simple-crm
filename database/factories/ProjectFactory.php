<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'client_id' => $this->faker->numberBetween(1, Client::all()->count()),
            'user_id' => $this->faker->numberBetween(1, User::all()->count()),
            'title' => $this->faker->words(3, true),
            'description' => $this->faker->text(100),
            'deadline' => $this->faker->dateTimeBetween('now', '+1 month')
        ];
    }
}
