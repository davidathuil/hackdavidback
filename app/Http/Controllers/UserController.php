<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
   public function index()
   {
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
            'firstname_users' => 'required|string',
            'lastname_users' => 'required|string',
            'email_users' => 'required|string',
            //  'image_link_users' => 'mimes:jpg,jpeg,png|image',

         ]
      );
      //   if ($request->file('image_link_users')) {
      //       $file = $request->file('image_link_users');
      //       $filename = date('YmdHi') . $file->getClientOriginalName();
      //       $file->move(public_path('image_link_users'), $filename);
      //   }

      $user = [
         'firstname_users' => $request->firstname,
         'lastname_users' => $request->lastname,
         'email_users' => $request->email,
         'password' => $request->password,
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



      return redirect()->route('users.index');
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
