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
        //$houses = config('nomefile');

        for ($i = 0; $i < 50; $i++) {
            $newTrain = new Train();

            $newTrain->company = $faker->company();
            $newTrain->departure_station = $faker->city();
            $newTrain->arrival_station = $faker->city();
            $newTrain->departure_time = $faker->time('H:i:s');
            $newTrain->arrival_time = $faker->time('H:i:s');
            $newTrain->train_code = $faker->randomNumber(4);
            $newTrain->carriage_count = $faker->numberBetween(1, 10);
            $newTrain->on_schedule = $faker->boolean();
            $newTrain->cancelled = $faker->boolean();

            $newTrain->save();
        }
        //
    }
}
