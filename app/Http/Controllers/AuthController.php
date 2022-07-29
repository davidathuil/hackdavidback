<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\UserRoleEvent;


class AuthController extends Controller
{

    public function register(Request $request)
    {
        // Filtres et validation du formulaire
        $validatedData = $request->validate([
            'firstname_users' => 'required|string|max:255',
            'lastname_users' => 'required|string|max:255',
            'email_users' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
            'event_id' => 'required|numeric',
            'role_id' => 'required|numeric',
        ]);


        $user = User::create([
            'firstname_users' => $validatedData['firstname_users'],
            'lastname_users' => $validatedData['lastname_users'],
            'email_users' => $validatedData['email_users'],
            'password' => Hash::make($validatedData['password']),
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;

        // if (Auth::user()->admin == 1) {
        //     $role_id = $validatedData['role_id'];
        // } else {
        //     $role_id = 2;
        // };


        $ure = UserRoleEvent::create([
            'user_id' => $user->id,
            'event_id' => $validatedData['event_id'],
            'role_id' =>  $validatedData['role_id'],

        ]);
        return response()->json([
            'success' => 'true',
            'token' => $token,
            'token_type' => 'Bearer',
            'admin authcontroler' => 'admin',
            'ure' => $ure,

        ], 200);
    }




    public function login(Request $request)
    {

        // Vérification d'existance de ce compte + connexion
        if (!Auth::attempt($request->only('email_users', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = User::where('email_users', $request['email_users'])->firstOrFail();
        if ($user->admin == 1) {
            $admin = "admin";
        } else { {
                $admin = "non admin";
            }
        }

        // Création d'un token d'accès
        $token = $user->createToken('auth_token')->plainTextToken;


        return response()->json([
            'success' => true,
            'token' => $token,
            'token_type' => 'Bearer',
            'admin' => $admin,
        ], 200);
    }




    public function loginevent(Request $request, $id)
    {
        // Vérification d'existance de ce compte + connexion
        if (!Auth::attempt($request->only('email_users', 'password'))) {
            return response()->json([
                'message' => 'Les informations sont invalides'
            ], 401);
        }

        $user = User::where('email_users', $request['email_users'])->firstOrFail();


        // Création d'un token d'accès
        $token = $user->createToken('auth_token')->plainTextToken;


        // Vérification si le compte est déjà participant à cet évènement
        $uretest = UserRoleEvent::where('event_id', $id)
            ->where('user_id', $user->id)
            ->get();

        if (!$uretest) {
            $ure = UserRoleEvent::firstOrCreate([
                'user_id' => $user->id,
                'event_id' => $id,
                'role_id' =>   2,
            ]);
        } else {
            $ure = "cette user est deja existant sur cet évènement";
        }

        return response()->json([
            'success' => true,
            'token' => $token,
            'ure' => $ure,
            'test' => $uretest,
        ], 200);
    }



    public function me(Request $request)
    {
        return response()->json([
            'success' => true,
            'user' => $request->user(),

        ], 200);
    }





    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response()->json([
            'message log out' => 'Le token a été supprimé'

        ]);
    }
}
