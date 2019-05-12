<?php

use Illuminate\Database\Seeder;
use Cotizate\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'Administrador';
        $role->slug = 'admin';
        $role->description = 'El ke manda';
        $role->save();

        $role = new Role();
        $role->name = 'Usuario';
        $role->slug = 'user';
        $role->description = 'Usuario de la red STV';
        $role->save();
    }
}
