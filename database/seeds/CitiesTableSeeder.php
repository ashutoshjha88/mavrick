<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
       for($i=0; $i<10; $i++)
       {
           \App\Models\Cities::create(
               [
                   'country_id' => '1',
                   'city_name' => $faker->city
               ]);
       }
    }
}
