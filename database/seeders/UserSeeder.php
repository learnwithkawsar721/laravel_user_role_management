<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user =User::where('email','admin@gmail.com')->first();
       
       if (is_null($user)) {
          $user = new User();
          $user->name = "admin";
          $user->email = "admin@gmail.com";
          $user->password = Hash::make('123456789');
          $user->save();

       }
    }
}
