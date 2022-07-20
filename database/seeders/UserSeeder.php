<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =  User::create([
            'lastname_users' => 'seedname',
            'firstname_users' => 'seedfirstname',
            'email_users' => 'test@test.com',
            'password' => Hash::make('password'),
            'admin' => 1,
        ]);
        // $user = User::where('email_users', 'test@test.com')->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;
        //     ->save;
        // $user->createToken('auth_token')->plainTextToken;
        // tokens()->create([
        //     'name' => 'auth_token',
        //     'tokenable_type' => 'App\Models\User',
        //     'tokenable_id' => '1',
        //     'token' => hash('sha256', 'N7fp6GTjO9CJD1QIhqv0Ty1ZZbJeS3tFIbToFJZQ'),
        //     'abilities' => ['*'],
        // ]);
    }
}
