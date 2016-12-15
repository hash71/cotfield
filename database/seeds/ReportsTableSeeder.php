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
                'project_id' => $faker->name,
                'project_name' => $faker->name,
                'buyer_name' => $faker->name,
                'supplier_name' => $faker->name,
                'contract_number' => $faker->name,
                'contract_date' => $faker->date("d/m/Y"),
                'origin' => $faker->name,
                's_c_price' => $faker->name,
                's_c_payment' => $faker->name,
                'p_i_quantity' => $faker->name,
                'p_i_latest_date_of_lc_opening' => $faker->date("d/m/Y"),
                'p_i_latest_date_of_shipment' => $faker->date("d/m/Y"),
                'lc_number' => $faker->name,
                'lc_date_of_issue' => $faker->date("d/m/Y"),
                'i_p_number' => $faker->name,
                'ip_date' => $faker->date("d/m/Y"),
                'ip_expiry_date' => $faker->date("d/m/Y"),
                'sro_date' => $faker->date("d/m/Y"),
                'lc_port_of_loading' => $faker->name,
                'eta_date' => $faker->date("d/m/Y")
            ]);
        }
    }
}
