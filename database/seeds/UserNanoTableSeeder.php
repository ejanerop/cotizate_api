<?php

use Illuminate\Database\Seeder;
use Cotizate\UserNano;

class UserNanoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nano = new UserNano();
        $nano->name = 'eric';
        $nano->ip_address = '172.1.1.1';
        $nano->model = 'Nanostation M2';
        $nano->save();
    }
}
