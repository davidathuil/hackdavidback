<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserSkill>
 */
class UserSkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'skill_id' => Skill::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ];
    }
}
