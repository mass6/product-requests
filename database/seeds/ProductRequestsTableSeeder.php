<?php

use Illuminate\Database\Seeder;

class ProductRequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\ProductRequest', 50)->create();
    }
}
