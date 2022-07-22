<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skill::create([
            'name_skills' => 'dev'
        ]);
        // Skill::create([
        //     'name_skills' => 'UI/UX'
        // ]);
        // Skill::create([
        //     'name_skills' => 'maker'
        // ]);
        // Skill::create([
        //     'name_skills' => 'management'
        // ]);
        // Skill::create([
        //     'name_skills' => 'commercial'
        // ]);
        // Skill::create([
        //     'name_skills' => 'communication'
        // ]);
        // Skill::create([
        //     'name_skills' => 'ops'
        // ]);
        // Skill::create([
        //     'name_skills' => 'desgin graphique'
        // ]);
    }
}
