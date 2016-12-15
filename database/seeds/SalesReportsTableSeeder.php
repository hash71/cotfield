<?php

use Illuminate\Database\Seeder;

class SalesReportsTableSeeder extends Seeder
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

            \App\SalesReport::create([
                'project_id' => $faker->name,
                'project_name' => $faker->name,
                'buyer_name' => $faker->name,
                'supplier_name' => $faker->name,
                'contract_number' => $faker->name,
                'contract_date' => $faker->date("d/m/Y"),
                'origin' => $faker->name,
                's_c_price' => $faker->name,
                's_c_payment' => $faker->name,
                'p_i_quantity' => $faker->name
            ]);

        }
    }
}
