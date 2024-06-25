<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class SujectStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            DB::table('subjects_student')->insert([
                'id_teacher' => $i+1,
                'asignatura_1' => $faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
                'asignatura_2' => $faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
                'studying_1' => $faker->randomElement([true, false]),
                'studying_2' => $faker->randomElement([true, false]),
            ]);
        }

        for ($i = 5; $i < 10; $i++) {
            DB::table('subjects_student')->insert([
                'id_teacher' => $i+1,
                'asignatura_1' => $faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
                'asignatura_2' => $faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
                'studying_1' => $faker->randomElement([true, false]),
                'studying_2' => $faker->randomElement([true, false]),
            ]);
        }
    }
}
