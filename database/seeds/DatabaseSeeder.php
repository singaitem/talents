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
        //Data Master
        $this->call(CompaniesTableSeeder::class);
        $this->call(HomeBasesTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
        $this->call(TransactionCategoriesTableSeeder::class);
        $this->call(TransactionTypesTableSeeder::class);
        $this->call(ElementsTableSeeder::class);

        //Person
    	$this->call(PersonsTableSeeder::class);
        $this->call(AddressesTableSeeder::class);
        $this->call(FamiliesTableSeeder::class);
        $this->call(CertificatesTableSeeder::class);


            
    	$this->call(EmployeesTableSeeder::class);
    	$this->call(UsersTableSeeder::class);

        $this->call(NotificationsTableSeeder::class);

        $this->call(SettingRequestsTableSeeder::class);
        $this->call(BalancesTableSeeder::class);
        $this->call(RequestsTableSeeder::class);
        $this->call(ClaimsTableSeeder::class);
        $this->call(ClaimDetailsTableSeeder::class);

        $this->call(SalariesTableSeeder::class);

    }
}
