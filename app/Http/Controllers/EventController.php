<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

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

        return response()->json(["event" => $event]);
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
