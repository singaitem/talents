<?php

use Illuminate\Database\Seeder;
use App\TransactionCategory;
class TransactionCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kacamata = new TransactionCategory();
        $kacamata->name='Kacamata';
        $kacamata->module='Benefit';
        $kacamata->save();

        $kacamata = new TransactionCategory();
        $kacamata->name='SPD Advance';
        $kacamata->module='Benefit';
        $kacamata->save();

        $kacamata = new TransactionCategory();
        $kacamata->name='Marital';
        $kacamata->module='Personalia';
        $kacamata->save();
    }
}
