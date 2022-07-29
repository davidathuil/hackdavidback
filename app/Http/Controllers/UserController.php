<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRoleEvent;
use App\Models\UserSkill;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
   public function index()
   {
      $idStaffs = UserRoleEvent::where('role_id', 1)->get('user_id');
      $idParticipants = UserRoleEvent::where('role_id', 2)->get('user_id');

      $users = User::all();
      foreach ($users as $user) {
         $user->userSkills;
         $user->userteam;
         $user->roles;
         $user->event;
      }
      // $users->userSkills;
      $admins = User::where('admin', 1)->get();
      $staffs = User::find($idStaffs);
      $participants = User::find($idParticipants);
      $ure = UserRoleEvent::get();


      return response()->json(["users" => $users, "admins" => $admins, "staffs" => $staffs, "participants" => $participants, "user_role_event" => $ure]);
   }


   public function user($id)
   {
      $user = User::findOrFail($id);
      $skills = [];
      foreach ($user->skills as $skill) {
         array_push($skills, $skill);
      }

      return response()->json(["user" => $user, "skills" => $skills]);
   }


   public function create()
   {
   }


   public function store(Request $request)
   // pour l'utilisateur
   {

      $validatedData = $request->validate(
         [
            'firstname_users' => 'required|alpha_dash',
            'lastname_users' => 'required|alpha_dash',
            'email_users' => 'required|email:rfc,dns|unique:users',
            'password' => 'string',
            'event_id' => 'required|numeric',
            // 'role_id' => 'required|numeric',

         ]
      );

      $user = [
         'firstname_users' => $request->firstname_users,
         'lastname_users' => $request->lastname_users,
         'email_users' => $request->email_users,
         'password' => Hash::make($request->password),


      ];

      $newuser = User::FirstOrCreate($user);
      // if (!$newuser) {
      //    return response()->json([
      //       'success' => 'false',
      //       'error' => "user deja existant",
      //    ]);
      // }
      $token = $newuser->createToken('auth_token')->plainTextToken;

      // if (Auth::user()->admin == "1") {
      //$role_id = $request->role_id;
      // } else {
      //    $role_id = 1;
      // };
      $ure = [
         'event_id' => $request->event_id,
         // 'role_id' => $request->role_id,

      ];


      $ure = UserRoleEvent::firstOrCreate([
         'user_id' => $newuser->id,
         'event_id' => $request->event_id,
         'role_id' =>  2,
      ]);

      // test  pour doublon project user firstorcrete ok

      // $ure = UserRoleEvent::create([
      //    'user_id' => [$newuser->id, Rule::unique('user_id')->where(fn ($query) => $query->where('event_id', $request->event_id))],

      //    'event_id' => 2,
      //    'role_id' =>  $role_id,
      // ]);

      return response()->json([
         'success' => 'true',
         'data' => $newuser,
         'ure' => $ure,
         'token' => $token,
         'token_type' => 'Bearer',



      ], 200);
   }


   public function userCreatedByAdmin(Request $request)
   // pour l'utilisateur
   {

      $validatedData = $request->validate(
         [
            'firstname_users' => 'required|alpha_dash',
            'lastname_users' => 'required|alpha_dash',
            'email_users' => 'required|email:rfc,dns|unique:users',
            'password' => 'string',
            'event_id' => 'required|numeric',
            'role_id' => 'required|numeric',

         ]
      );

      $user = [
         'firstname_users' => $request->firstname_users,
         'lastname_users' => $request->lastname_users,
         'email_users' => $request->email_users,
         'password' => Hash::make($request->password),


      ];

      $newuser = User::FirstOrCreate($user);

      $token = $newuser->createToken('auth_token')->plainTextToken;

      $ure = [
         'event_id' => $request->event_id,
         'role_id' => $request->role_id,

      ];


      $ure = UserRoleEvent::firstOrCreate([
         'user_id' => $newuser->id,
         'event_id' => $request->event_id,
         'role_id' =>  $request->role_id,
      ]);


      return response()->json([
         'success' => 'true',
         'data' => $newuser,
         'ure' => $ure,
         'token' => $token,
         'token_type' => 'Bearer',

      ], 200);
   }



   public function show($id)
   {
   }


   public function edit($id)
   {
   }


   public function update(Request $request, $id)
   {

      // Validation de formulaire avant envoie dans la BDD
      $request->validate(
         [
            'firstname_users' => 'required|alpha_dash',
            'lastname_users' => 'required|alpha_dash',
            'email_users' =>  'required|email',
            // (dégradation) 
            // 'skills' => '',
         ]
      );

      $user = User::find($id);

      $user->firstname_users = $request->firstname_users;
      $user->lastname_users = $request->lastname_users;
      $user->email_users = $request->email_users;
      $user->save();

      $URE = UserRoleEvent::where('event_id', $request->event_id)->where('user_id', $user->id)->first();
      $newrole = $URE->role_id = $request->role_id;
      $URE->save();

      // foreach (){
      //    $userskill = UserSkill::firstOrCreate([
      //          'user_id' => $user->id,
      //          'skill_id' => $request->,
      //       ]);
      // };


      return response()->json(["message" => "Utilisateur modifié avec succès", "le nouveau role" => $newrole, "URE" => $URE]);
   }



   public function destroy($id)
   {
      $user = User::find($id);
      $user->delete();
      return response()->json(['message' => 'Participant retiré de la liste avec succès !'], 201);
   }
}
