<?php

use Illuminate\Database\Seeder;
use Cotizate\Role;
use Cotizate\User;
use Cotizate\AccessNano;
use Cotizate\UserNano;
use Cotizate\Income;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_guest = Role::where('slug', 'user')->first();
        $role_admin = Role::where('slug', 'admin')->first();
        $access_nano = AccessNano::find(1);
        $user_nano = UserNano::find(1);




        $user = new User();
        $user->username = 'Eric';
        $user->ip_address = '10.24.122.59';
        $user->password = bcrypt('12345678');
        $user->roles()->associate($role_guest);
        $user->access_nano()->associate($access_nano);
        $user->user_nano()->associate($user_nano);
        $user->save();

        $income = new Income();
        $income->year = '2019';
        $income->jan = 1;
        $income->feb = 1;
        $income->mar = 1;
        $income->apr = 1;
        $income->may = 1;
        $income->user()->associate($user);
        $income->save();

        $user = new User();
        $user->username = 'Mandi';
        $user->ip_address = '10.24.122.1';
        $user->password = bcrypt('12345678');
        $user->roles()->associate($role_admin);
        $user->access_nano()->associate($access_nano);
        $user->user_nano()->associate($user_nano);
        $user->save();

        $income = new Income();
        $income->year = '2019';
        $income->jan = 1;
        $income->feb = 1;
        $income->mar = 1;
        $income->apr = 1;
        $income->user()->associate($user);
        $income->save();

    }
}
