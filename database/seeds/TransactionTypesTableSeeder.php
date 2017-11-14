<?php

use Illuminate\Database\Seeder;
use App\TransactionType;
use App\TransactionCategory;
class TransactionTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kacamata = TransactionCategory::where('name','Kacamata')->first();

        $lensa = new TransactionType();
        $lensa->transaction_category_id=$kacamata->id;
        $lensa->name='Lens';
        $lensa->type='One Time 1 Years';
        $lensa->save();

        $frame = new TransactionType();
        $frame->transaction_category_id=$kacamata->id;
        $frame->name='Frame';
        $frame->type='One Time 2 Years';
        $frame->save();


    }
}
