<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 1; $i++) {
            DB::table('users')->insert([
                'avatar' => $faker->randomElement(['assets/images/student_f.png', 'assets/images/student_m.png', 'assets/images/teacher_m.png', 'assets/images/teacher_f.png']),
                'name' => $faker->firstName,
                'surname1' => $faker->lastName,
                'surname2' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'dni' => $faker->unique()->numerify('#########A'),
                'birthdate' => $faker->date('Y-m-d', '2000-12-31'),
                'gender' => $faker->randomElement(['male', 'female']),
                'rol' => $faker->randomElement(['Administrador', 'Alumno', 'Profesor']),
                'adress' => $faker->address,
                'phone' => $faker->phoneNumber,
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
