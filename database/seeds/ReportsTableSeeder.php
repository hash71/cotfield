<?php

use Illuminate\Database\Seeder;

class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 1; $i <= 100; $i++) {
            \App\Report::create([
                'project_id' => $i,
                'user_id' => 1,
                'project_name' => $faker->name,
                'buyer_name' => $faker->name,
                'supplier_name' => $faker->name,
                'contract_number' => $faker->name,
                'contract_date' => $faker->date("Y-m-d"),
                's_c_origin' => $faker->name,
                's_c_price' => $faker->name,
                's_c_payment' => $faker->name,
                'p_i_quantity' => $faker->name,
                'p_i_latest_date_of_lc_opening' => $faker->date("Y-m-d"),
                'p_i_latest_date_of_shipment' => $faker->date("Y-m-d"),
                'lc_number' => $faker->name,
                'lc_date_of_issue' => $faker->date("Y-m-d"),
                'i_p_number' => $faker->name,
                'ip_date' => $faker->date("Y-m-d"),
                'ip_expiry_date' => $faker->date("Y-m-d"),
                'sro_date' => $faker->date("Y-m-d"),
                'lc_port_of_loading' => $faker->name,
                'eta_date' => $faker->date("Y-m-d")
            ]);
        }
    }
}
