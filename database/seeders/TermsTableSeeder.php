<?php

namespace Database\Seeders;
use App\Models\Term;
use Illuminate\Database\Seeder;

class TermsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Term::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            Term::create([
                'start' => $faker->date,
                'end' => $faker->date,
                'name' => $faker->sentence,
                'description' => $faker->paragraph,
                'active' => mt_rand(0, 1)
            ]);
        }
    }
}
