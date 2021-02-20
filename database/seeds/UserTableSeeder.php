<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Cotizate\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $user = new User();
        $user->username = 'vengador';
        $user->password = bcrypt('sc3iFQxt');
        $user->api_token = Str::random(60);
        $user->save();
    }
}
