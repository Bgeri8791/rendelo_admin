<?php

namespace Database\Seeders;

use App\Models\Patients;
use App\Models\Visits;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class VisitsSeeder extends Seeder
{

    public function run(): void
    {
        $faker = Faker::create('hu_HU');
        $patients = Patients::all();

        foreach ($patients as $patient) {
            $visitCount = rand(1, 5);

            for ($i = 0; $i < $visitCount; $i++) {
                Visits::create([
                    'patient_id' => $patient->id,
                    'visit_date' => $faker->dateTimeBetween('-7 days', 'now'),
                    'reason'     => $faker->sentence(rand(2, 5)),
                    'diagnosis'  => rand(0, 1) ? $faker->sentence(rand(2, 5)) : null,
                    'price'      => $faker->numberBetween(10000, 30000),
                ]);
            }
        }

        $this->command->info('Visits seeder lefutott Faker adatokkal.');
    }
}
