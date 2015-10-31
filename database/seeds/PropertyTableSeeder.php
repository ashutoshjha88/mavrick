<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;

class PropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for($i=0; $i<100; $i++)
        {
            \App\Models\Property::create(
                [
                    'user_id' => $faker->randomElement([1,2,3,4]),
                    'property_url' => $faker->url,
                    'image' => $faker->imageUrl(180, 140),
                    'property_title' => $faker->sentence,
                    'bid_price'=>$faker->randomFloat(null, 1000),
                    'location'=>$faker->address.', '.$faker->city.', '.$faker->country,
                    'lat'=>$faker->latitude,
                    'lng'=>$faker->longitude,
                    'city_id'=>$faker->randomElement([1,2,3,4,5,6,7,8,9,10]),
                    'bid_start_date_time'=>Carbon::now()->addMinutes( ( ($i+1) * 5 ) ),
                    'bid_close_date_time'=>Carbon::now()->addMinutes( ( ($i+1) * 10 ) )
                ]);
        }
    }
}
