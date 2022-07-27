<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Team;

class TeamController extends Controller
{

    public function index()
    {
        $teams = Team::all();
        foreach ($teams as $team) {
            $team->usert;
            $team->room;
        }

        return response()->json(["teams" => $teams]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'names_teams' => 'required|string',
                'names_projects_teams' => 'required|string',
                'subject_teams' => 'required|string',
                'room_id' => 'Numeric',
                'event_id' => 'Numeric',

            ]
        );

        $team = [
            'names_teams' => $request->names_teams,
            'names_projects_teams' => $request->names_projects_teams,
            'subject_teams' => $request->subject_teams,
            'room_id' => $request->room_id,
            'event_id' => $request->event_id,


        ];

        $newTeam = Team::create($team);


        return response()->json(['message' => 'Equipe créée avec succès !', 'team' => $newTeam,], 201);
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
