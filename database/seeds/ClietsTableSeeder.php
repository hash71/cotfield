<?php

use Illuminate\Database\Seeder;

class ClietsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 00; $i++) {
            \App\Client::create([
                'name' => $faker->name,
                'type' => $faker->randomElements(['buyer','supplier'])
            ]);
        }
    }
}
