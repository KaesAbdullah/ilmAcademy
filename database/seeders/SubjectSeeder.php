<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            DB::table('subjects')->insert([
                'id_teacher' => $i+1,
                'grade' => $faker->randomElement(['A1', 'A2','B1', 'B2','C1', 'C2', 'C3']),
                'subject' => "Arabe",
            ]);
        }
        for ($i = 5; $i < 10; $i++) {
            DB::table('subjects')->insert([
                'id_teacher' => $i+1,
                'grade' => $faker->randomElement(['A1', 'A2','B1', 'B2','C1', 'C2', 'C3']),
                'subject' => "Religion",
            ]);
        }
    }
}
