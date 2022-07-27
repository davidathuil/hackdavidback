<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\UserSkill;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ProfilPage;
use Illuminate\Support\Facades\Auth;


class ProfilPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json(['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'lastname_users' => 'required|string',
            'firstname_users' => 'required|string',
            'email_users' => 'required|string',
            'adress_users' => 'string',
            'likedin_link_users' => 'string',
            'web_link_users' => 'string',
            'github_link_users' => 'string',
            'portfolio_link_users' => 'string',
            'biography_users' => 'string',
            "image_link_users" => 'bail|image|max:1024',
        ]);

        $chemin_image = $request->picture->store("posts");

        $profilPage = [
            'lastname_users' => $request->input('input_lastname_profil'),
            'firstname_users' => $request->input('input_firstname_profil'),
            'email_users' => $request->input('email_profil'),
            'adress_users' => $request->input('input_address_profil'),
            'likedin_link_users' => $request->input('input_linkedin_profil'),
            'web_link_users' => $request->input('input_website_profil'),
            'github_link_users' => $request->input('input_github_profil'),
            'portfolio_link_users' => $request->input('input_portfolio_profil'),
            'biography_users' => $request->input('input_bio_profil'),
            "picture" => $chemin_image,

        ];

        User::create($profilPage);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = user::find($id);
        $user->userSkills;
        $user->userteam;
        $user->roles;
        $user->event;

        $skills = Skill::all();
        // $user_skills = UserSkill::all();
        // return response()->json([$user, $skills, $user_skills]);
        return response()->json([$user, $skills]);
    }

    public function showOwn()
    {
        $user = Auth::user();
        $user->userSkills;
        $skills = Skill::all();

        return response()->json(['user' => $user, "skills" => $skills]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user = Auth::user();
        $user->userSkills;
        $skills = Skill::all();
        foreach ($skills as $skill) {
            $skill->userskill;
        }

        return response()->json([
            'success' => true,
            'user' => $user,
            'skills' => $skills,

        ], 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        $user->update([
            "input_lastname_profil" => $request->input_lastname_profil,
            "input_firstname_profil" => $request->input_firstname_profil,
            "email_profil" => $request->email_profil,
            "adress_users" => $request->adress_users,
            "likedin_link_users" => $request->likedin_link_users,
            "web_link_users" => $request->web_link_users,
            "github_link_users" => $request->github_link_users,
            "portfolio_link_users" => $request->portfolio_link_users,
            "biography_users" => $request->biography_users,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
