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
                'id_room_teams' => 'required|Numeric',
                'id_events_teams' => 'required|Numeric',

            ]
        );

        $team = [
            'names_teams' => $request->names_teams,
            'names_projects_teams' => $request->names_projects_teams,
            'subject_teams' => $request->subject_teams,
            'id_room_teams' => $request->id_room_teams,
            'id_events_teams' => $request->id_events_teams,


        ];

        $newteam = Team::create($team);


        return response()->json([
            'success' => 'true',
            'data' => $newteam,

        ], 208);
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
