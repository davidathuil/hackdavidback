<?php

namespace App\Http\Controllers;

use App\Models\UserTeam;
use Illuminate\Http\Request;

class UserTeamController extends Controller
{

    public function index()
    {
        $uTeams = UserTeam::all();

        return response()->json(["users_teams" => $uTeams]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [

                'id_user' => 'required|Numeric',
                'id_team' => 'required|Numeric',

            ]
        );

        $userteam = [
            'id_user' => $request->id_user,
            'id_team' => $request->id_team,


        ];

        $newuserteam = UserTeam::create($userteam);


        return response()->json([
            'success' => 'true',
            'data' => $newuserteam,

        ], 200);
    }


    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
