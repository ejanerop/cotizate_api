<?php

use Illuminate\Database\Seeder;
use Cotizate\AccessNano;

class AccessNanoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nano = new AccessNano();
        $nano->name = '@1';
        $nano->save();

        $nano = new AccessNano();
        $nano->name = '@2';
        $nano->save();

        $nano = new AccessNano();
        $nano->name = '@3';
        $nano->save();

        $nano = new AccessNano();
        $nano->name = '@4';
        $nano->save();
    }
}
