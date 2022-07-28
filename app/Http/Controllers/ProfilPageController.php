<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\ProfilPage;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;


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
        //
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
        $user->events;

        $skills = Skill::all();
        // $user_skills = UserSkill::all();
        // return response()->json([$user, $skills, $user_skills]);
        return response()->json([$user, $skills]);
    }

    public function showOwn()
    {
        $user = Auth::user();
        $user->userSkills;
        $user->userEvents;
        $skills = Skill::all();
        $events = Event::all();

        return response()->json(['user' => $user, "skills" => $skills, "events" => $events]);
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
    public function update(Request $request)
    {
        $user = Auth::user();

        // 1. La validation
        $rules = [
            'lastname_users' => 'required|string',
            'firstname_users' => 'required|string',
            'adress_users' => 'string|nullable',
            'likedin_link_users' => 'url|nullable',
            'web_link_users' => 'url|nullable',
            'github_link_users' => 'url|nullable',
            'portfolio_link_users' => 'url|nullable',
            'biography_users' => 'string|nullable',
            "image_link_users" => 'image|max:1024|nullable'
        ];

        // Si une nouvelle image est envoyée
        if ($request->has("image_link_users")) {
            // On ajoute la règle de validation pour "picture"
            $rules["image_link_users"] = 'bail|image|max:1024';
        }

        $this->validate($request, $rules);

        // On upload l'image dans "/storage/app/public/profile_img"
        if ($request->has("image_link_users")) {

            // On supprime l'ancienne image
            if (isset($user->image_link_users)) {
                Storage::delete($user->image_link_users);
            }

            $path_image = $request->image_link_users->store("avatar");
        }

        $user->image_link_users = isset($path_image) ? $path_image : $user->image_link_users;
        $user->firstname_users = $request->firstname_users;
        $user->lastname_users = $request->lastname_users;
        $user->adress_users = $request->adress_users;
        $user->biography_users = $request->biography_users;
        $user->web_link_users = $request->web_link_users;
        $user->likedin_link_users = $request->likedin_link_users;
        $user->github_link_users = $request->github_link_users;
        $user->portfolio_link_users = $request->portfolio_link_user;
        $user->save();

        return response()->json(["message" => "User updated"]);
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
