<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Train;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // da array json
        // $houses = file_get_contents('data.json');
        // $houses = json_decode($houses, true);

        // con array php in config
        $companyNames = config('db.company_names');
        $cities = config('db.cities');

        for ($i = 0; $i < 25; $i++) {
            $newTrain = new Train();

            $newTrain->company = $faker->randomElement($companyNames);
            $newTrain->departure_station = $faker->randomElement($cities);
            $newTrain->arrival_station = $faker->randomElement($cities);
            $newTrain->departure_time = $faker->time('H:i');
            $newTrain->arrival_time = $faker->time('H:i');
            $newTrain->train_code = $faker->randomNumber(4);
            $newTrain->carriage_count = $faker->numberBetween(1, 10);
            $newTrain->on_schedule = $faker->boolean();
            $newTrain->cancelled = $faker->boolean();

            $newTrain->save();
        }
        //
    }
}
