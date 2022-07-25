<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{

   public function index()
   {
      $skills = Skill::all();

      return response()->json(["skills" => $skills]);
   }

   public function show($id)
   {
   }
}
