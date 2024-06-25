<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('payments')->insert([
                'student_id' => $i+1,
                'name' => $faker->name,
                'account_number' => $faker->unique()->numerify('###########'),
                'payment_date' => now(),
                'paid' => $faker->randomElement([true, false]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
