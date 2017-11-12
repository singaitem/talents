<?php

use Illuminate\Database\Seeder;
use App\Company;
class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comp1 = new Company();
        $comp1->name='PT. XYZ';
        $comp1->code='XYZ123';
        $comp1->save();
    }
}
