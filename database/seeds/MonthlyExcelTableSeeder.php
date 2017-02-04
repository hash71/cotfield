<?php

use Illuminate\Database\Seeder;

class MonthlyExcelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 100; $i++) {

            \App\MonthlyExcel::create([
                "importer" => $faker->name,
                "exporter" => $faker->name,
                "exporter_origin" => $faker->country,
                "product_origin" => $faker->country,
                "grade_type" => $faker->word . '-' . $faker->numberBetween(1, 10),
                "staple" => $faker->numberBetween(1, 10) . ' ' . 'MM',
                "mic" => $faker->name,
                "rate_per_lb_usd" => $faker->randomFloat(),
                "qty_mt" => $faker->numberBetween(100, 1000),
                "port" => "CHITTAGONG",
                "month" => $faker->numberBetween(1, 12),
                "year" => $faker->year,
                "user_id" => 1
            ]);
        }
    }
}
