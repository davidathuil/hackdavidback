<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RunningOrder>
 */
class RunningOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name_run_orders' => $this->faker->word(),
            'start_date_run_orders' => $this->faker->dateTimeInInterval('-1 week', '+3 days');,
            'time_run_orders' => $this->faker->time(':i'),
            'teams_quantity_run_orders' => $this->faker->numberBetween(1, Team::all()->count()),
        ];
    }
}
