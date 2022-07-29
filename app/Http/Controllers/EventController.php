<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Role;
use App\Models\Team;
use App\Models\User;
use App\Models\UserRoleEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

    public function index()
    {
        $event = Event::all();


        return response()->json(["event" => $event]);
    }




    public function store(Request $request)
    {
        $request->validate([
            'names_events' => 'required|string',
            'start_dates_events' => 'required|date',
            'end_dates_events' => 'required|date',
            'end_dates_inscriptions_events' => 'required|date',
            'location_events' => 'required|string',
        ]);

        $event = ([
            'names_events' => $request->names_events,
            'start_dates_events' => $request->start_dates_events,
            'end_dates_events' => $request->end_dates_events,
            'end_dates_inscriptions_events' => $request->end_dates_inscriptions_events,
            'location_events' => $request->location_events,
        ]);

        $newEvent = Event::create($event);

        return response()->json(['message' => 'Evènement créé avec succès !', 'event' => $newEvent], 201);
    }


    public function show($id)
    {
        $event = Event::find($id);
        $teams = Team::with('event')->where('event_id', $id)->get();
        $users = $event->users;
        foreach ($teams as $team) {
            $team->room;
        };

        $staffs = UserRoleEvent::where([['role_id', 1], ['event_id', $id]])->get();
        $staffUsers = [];
        foreach ($staffs as $staff) {
            array_push($staffUsers, $staff->user->id);
        };
        $key = array_search("auth ne marche pas meme avec middelware", $staffUsers);
        // if (!$key) {
        //     return response()->json(["checkstaff" => "ne fait pas partie du staff", "checkadmin" => 13, "key" => $key]);
        // }
        // AU CAS OU PEUT ETRE JE SAIS PAS...
        // $participants = UserRoleEvent::where([['role_id', 2], ['event_id', $id]])->get();
        // $partUsers = [];
        // foreach ($participants as $participant) {
        //     array_push($partUsers, $participant->user);
        // };
        // foreach ($partUsers as $user) {
        //     $user->skills;
        // }
        // else {
        return response()->json(["event" => $event, "teams" => $teams, "staffs" => $staffs, "check" => $staffUsers]);
        // }
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        // Validation de formulaire avant envoie dans la BDD
        $request->validate([
            'names_event' => 'required|string',
            'start_dates_event' => 'required|string',
            'end_dates_events' => 'required|string',
            'end_dates_inscriptions_events' => 'required|string',
            'location_events' => 'required|string',
        ]);


        $event = Event::find($id);
        $event->names_event = $request->input('names_event');
        $event->start_dates_event = $request->input('start_dates_event');
        $event->end_dates_events = $request->input('end_dates_events');
        $event->end_dates_inscriptions_events = $request->input('end_dates_inscriptions_events');
        $event->location_events = $request->input('location_events');
        $event->save();

        return response()->json(['message' => 'Evènement modifié avec succès !'], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return response()->json(['message' => 'Evènement supprimé avec succès !'], 201);
    }
}
