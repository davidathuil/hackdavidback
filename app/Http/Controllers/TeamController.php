<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;



class TeamController extends Controller
{

    public function index()
    {
        $teams = Team::all();
        foreach ($teams as $team) {
            $team->usert;
            $team->room;
        }
        $rooms = Room::all();

        return response()->json(["teams" => $teams, "rooms" => $rooms]);
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
        // $eventall = Event::all();

        // $user = Auth::user();
        // $userstaffroll = $user->roles->role_id = 1;
        // $userevent = $user->event;

        // $usereventrolestaff = $userevent->$userstaffroll;
        // est ce que c'est juste?


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


    public function show($id)
    {
        $team = Team::find($id);
        // $teamUsers = $team->users;


        return response()->json(["team" => $team]);

        // vide à la base

        // $team = Team::find($id);
        // $teamUsers = $team->users;


        // return response()->json(["team" => $team, "users" => $teamUsers]);

    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $team = Team::find($id);
        $team->delete();
        return response()->json(['message' => 'Équipe supprimé avec succès !'], 201);
    }
}
