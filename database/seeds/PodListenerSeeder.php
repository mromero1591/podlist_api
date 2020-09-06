<?php

use Illuminate\Database\Seeder;

class PodListenerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(\App\PodListener::class, 20)->create();
    }
}
