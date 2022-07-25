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
            'start_dates_events' => $this->faker->dateTimeInInterval('-1 week', '+3 days'),
            'end_dates_events' => $this->faker->dateTimeInInterval('+3 days', '+5 days'),
            'end_dates_inscriptions_events' =>  $this->faker->dateTimeInInterval('+3 week', '+6 weeks'),
            'location_events' =>  $this->faker->city(),
        ];
    }
}
