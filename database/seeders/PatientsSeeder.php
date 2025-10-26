<?php

namespace Database\Seeders;

use App\Models\Patients;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class PatientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('hu_HU');

        for ($i = 0; $i < 5; $i++) { 
            Patients::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'birth_date' => $faker->date(),
                'id_type' => $faker->randomElement(['TAJ', 'PASSPORT', 'PERSONAL_ID']),
                'id_number' => $faker->unique()->numerify('#########'),
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'is_active' => $faker->boolean(80),
            ]);
        }
        $this->command->info('Páciens seeder lefutott Faker adatokkal.');
    }
}
