<?php

namespace App\Http\Controllers;

use App\Models\RunningOrder;
use Illuminate\Http\Request;

class RunningOrderController extends Controller
{

    public function index()
    {
        $ro = RunningOrder::all();

        return response()->json(["data" => $ro]);
    }



    public function create()
    {
        //
    }



    public function store(Request $request)
    {

        $request->validate(
            [
                'name_run_orders' => 'required|alpha_dash',
                'start_date_run_orders' => 'required|date',
                'time_run_orders' => 'required|date_format:H:i',
                'teams_quantity_run_orders' => 'required|numeric',
            ]
        );

        $ro = [
            'name_run_orders' => $request->name_run_orders,
            'start_date_run_orders' => $request->start_date_run_orders,
            'time_run_orders' => $request->time_run_orders,
            'teams_quantity_run_orders' => $request->teams_quantity_run_orders,
        ];

        $newro = RunningOrder::create($ro);

        return response()->json([
            'success' => 'true',
            'data' => $newro,

        ], 200);
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
