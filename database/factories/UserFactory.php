<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {


        return   [
            'lastname_users' => $this->faker->name(),
            'firstname_users' => $this->faker->firstName(),
            'email_users' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('users'),
            // 'remember_token' => Str::random(10),

        ];
        // $user->createToken('auth_token')->plainTextToken;
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
