<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(OptionsTableSeeder::class);
        $this->call(OptionListsTableSeeder::class);
        $this->call(FormElementsTableSeeder::class);
//        $this->call(ProjectsTableSeeder::class);
//        $this->call(ReportsTableSeeder::class);
        $this->call(MonthlyExcelTableSeeder::class);
        \App\User::create([
            'username' => 'admin',
            'role' => 'admin',
            'password' => bcrypt('admin')
        ]);
    }
}
