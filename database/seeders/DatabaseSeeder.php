<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Term;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        // Term::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few terms in our database:
        for ($i = 0; $i < 30; $i++) {
            DB::table('terms')->insert([
                'name' => $faker->sentence,
                'description' => $faker->paragraph,
                'active' => mt_rand(0, 1),
                'start' => $faker->date,
                'end' => $faker->date,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        DB::table('users')->insert([
            'name' => 'Eduard',
            'email' => 'eduardsnchez@gmail.com',
            'token' => '',
            'password' => '$2y$10$94eJ85GSQ3V5y/Zj1V86TOS2CZrLJ7LH2oWNJziwD4wSAi0GCmNVi',
            'role' => 'admin',
            'created_at' => '2021-03-10 11:21:37',
            'updated_at' => '2021-03-10 11:21:37'
        ]);

        DB::table('users')->insert([
            'name' => 'Pablo',
            'email' => 'pablo@gmail.com',
            'token' => '',
            'password' => '$2y$10$94eJ85GSQ3V5y/Zj1V86TOS2CZrLJ7LH2oWNJziwD4wSAi0GCmNVi',
            'role' => 'alumn',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        for ($i = 0; $i < 100; $i++) {
            DB::table('users')->insert([
                'name' => $faker->firstName,
                'email' => $faker->safeEmail,
                'token' => '',
                'password' => Hash::make($faker->word),
                'role' => 'alumn',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            DB::table('careers')->insert([
                'term_id' => mt_rand(1, 30),
                'name' => $faker->word,
                'code' => $faker->regexify('[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}'),
                'description' => $faker->paragraph,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
