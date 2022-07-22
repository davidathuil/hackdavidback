<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
   public function index()
   {
      $users = User::all();

      return response()->json(["users" => $users]);
   }


   public function create()
   {
   }


   public function store(Request $request)
   {

      // 'firstname_users'
      // 'lastname_users'
      // 'email_users'
      // 'password_users'
      // 'adress_users'
      // 'likedin_link_users'
      // 'web_link_users'
      // 'github_link_users'
      // 'portfolio_link_users'
      // 'biography_users'
      // 'image_link_users'
      // 'admin'



      $request->validate(
         [
            'firstname_users' => 'required|alpha_dash',
            'lastname_users' => 'required|alpha_dash',
            'email_users' => 'required|email',
            // 'email_verified_at' => 'email',
            'password' => 'string',
            // 'adress_users' => 'alpha_dash',
            // 'likedin_link_users' => 'alpha_dash',
            // 'web_link_users' => 'alpha_dash',
            // 'github_link_users' => 'alpha_dash',
            // 'portfolio_link_users' => 'alpha_dash',
            // 'biography_users' => 'alpha_dash',
            // 'image_link_users' => 'alpha_dash',
            // 'admin' => 'boolean',
            //  'image_link_users' => 'mimes:jpg,jpeg,png|image',

         ]
      );
      //   if ($request->file('image_link_users')) {
      //       $file = $request->file('image_link_users');
      //       $filename = date('YmdHi') . $file->getClientOriginalName();
      //       $file->move(public_path('image_link_users'), $filename);
      //   }

      $user = [
         'firstname_users' => $request->firstname_users,
         'lastname_users' => $request->lastname_users,
         'email_users' => $request->email_users,
         // 'email_verified_at' => $request->email_verified_at,
         'password' => $request->password,
         // 'adress_users' => $request->adress_users,
         // 'likedin_link_users' => $request->likedin_link_users,
         // 'web_link_users' => $request->web_link_users,
         // 'github_link_users' => $request->github_link_users,
         // 'portfolio_link_users' => $request->portfolio_link_users,
         // 'biography_users' => $request->biography_users,
         // 'image_link_users' => $request->image_link_users,
         // 'admin' => $request->admin,
         // 'image' => $filename ?? $pathimage[$idphoto] ?? "",





      ];

      $newuser = User::create($user);

      // prochaine etape role project staf   
      //    $stafproject = [
      //       'id_role' => 1,
      //       'id_user' => $newuser->id,
      //       'id_event ' =>$request->event ,
      //   ];
      //   users_roles_events::create($$stafproject);

      return response()->json([
         'success' => 'true',
         'data' => $newuser,

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
   }


   public function destroy($id)
   {
   }
}
