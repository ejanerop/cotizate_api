<?php

use Illuminate\Database\Seeder;
use App\ResourceType;

class ResourceTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = new ResourceType();
        $type->resource_type = 'Texto';
        $type->save();

        $type = new ResourceType();
        $type->resource_type = 'Imagen';
        $type->save();

        $type = new ResourceType();
        $type->resource_type = 'Audio';
        $type->save();

        $type = new ResourceType();
        $type->resource_type = 'Video';
        $type->save();
    }
}
