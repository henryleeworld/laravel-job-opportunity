<?php

namespace Database\Seeders;

use App\Models\Location;
use Faker;
use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        foreach(range(1, 7) as $id)
            Location::create(['name' => $faker->unique()->state]);
    }
}
