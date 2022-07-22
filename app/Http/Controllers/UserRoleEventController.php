<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRoleEvent;

class UserRoleEventController extends Controller
{

    public function index()
    {
        $usersRolesEvents = UserRoleEvent::all();
        dd(UserRoleEvent::all());

        return response()->json(["ure" => $usersRolesEvents]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
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
