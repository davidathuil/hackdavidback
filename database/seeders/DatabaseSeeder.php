<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\SkillSeeder;
use App\Models\UserRoleEvent;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserSeeder::class
        ]);
        $this->call([
            RoleSeeder::class
        ]);
        $this->call([
            SkillSeeder::class
        ]);
        \App\Models\Event::factory(3)->create();
        \App\Models\User::factory(15)->create([]);
        // \App\Models\UserRoleEvent::factory(3)->create();
        \App\Models\UserRoleEvent::factory()->count(10)->create();
        \App\Models\Room::factory()->count(3)->create();
        \App\Models\Team::factory()->count(3)->create();
        \App\Models\UserTeam::factory()->count(15)->create();
        \App\Models\RunningOrder::factory()->count(5)->create();
        \App\Models\UserSkill::factory()->count(2)->create();
    }
}
