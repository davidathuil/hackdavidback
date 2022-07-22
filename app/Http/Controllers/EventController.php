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


    public function create()
    {
        //
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
        //
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
        //
    }
}
