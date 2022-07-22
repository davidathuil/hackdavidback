<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'names_events' => $this->faker->name(),
            'start_dates_events' => $this->faker->dateTime(),
            'end_dates_events' => $this->faker->dateTime(),
            'end_dates_inscriptions_events' =>  $this->faker->dateTime(),
            'location_events' =>  $this->faker->city(),
        ];
    }
}
