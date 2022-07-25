<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Models\UserSkill;


class UserSkillController extends Controller
{

    public function index()
    {
        $uSkills = UserSkill::all();

        return response()->json(["users_skills" =>  $uSkills]);
    }
}
