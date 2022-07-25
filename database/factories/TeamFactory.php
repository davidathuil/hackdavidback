<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use  App\Models\Room;
use  App\Models\Event;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {


        return   [
            'names_teams' => $this->faker->word(),
            'names_projects_teams' => $this->faker->word(),
            'subject_teams' => $this->faker->word(),
            'room_id' => Room::all()->random()->id,
            'event_id' => Event::all()->random()->id,
        ];
    }
}
