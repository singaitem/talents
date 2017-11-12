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
        $this->call(CompaniesTableSeeder::class);


    	$this->call(PersonsTableSeeder::class);
    	$this->call(EmployeesTableSeeder::class);
    	$this->call(UsersTableSeeder::class);
    }
}
