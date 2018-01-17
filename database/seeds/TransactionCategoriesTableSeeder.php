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
        $tranCat = new TransactionCategory();
        $tranCat->name='Kacamata';
        $tranCat->module='Benefit';
        $tranCat->save();

        $tranCat = new TransactionCategory();
        $tranCat->name='SPD Advance';
        $tranCat->module='Benefit';
        $tranCat->save();

        $tranCat = new TransactionCategory();
        $tranCat->name='Change Marital Status';
        $tranCat->module='Personalia';
        $tranCat->save();

        $tranCat = new TransactionCategory();
        $tranCat->name='Family';
        $tranCat->module='Personalia';
        $tranCat->save();

        $tranCat = new TransactionCategory();
        $tranCat->name='Address';
        $tranCat->module='Personalia';
        $tranCat->save();

        $tranCat = new TransactionCategory();
        $tranCat->name='Certificate';
        $tranCat->module='Personalia';
        $tranCat->save();


        $tranCat = new TransactionCategory();
        $tranCat->name='Family';
        $tranCat->module='Personalia';
        $tranCat->save();

        $tranCat = new TransactionCategory();
        $tranCat->name='Medical';
        $tranCat->module='Benefit';
        $tranCat->save();

        $tranCat = new TransactionCategory();
        $tranCat->name='Medical Overlimit';
        $tranCat->module='Benefit';
        $tranCat->save();

        $tranCat = new TransactionCategory();
        $tranCat->name='Business Travel';
        $tranCat->module='Benefit';
        $tranCat->save();

        $tranCat = new TransactionCategory();
        $tranCat->name='Wedding';
        $tranCat->module='Benefit';
        $tranCat->save();
    }
}
