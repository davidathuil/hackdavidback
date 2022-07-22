<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Team;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
               'names_teams' => 'required|alpha',
               'names_projects_teams' => 'required|alpha_dash',
               'subject_teams' => 'required|alpha',
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
   
         $newteam = User::create($team);
   
   
         return response()->json([
            'success' => 'true',
            'data' => $newteam,
   
         ], 200);
      }
   
   
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
