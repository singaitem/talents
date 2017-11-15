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
        $lensa->name='Lensa Monofocus Non Cylindris';
        $lensa->type='One Time 1 Years';
        $lensa->save();

        $lensa2 = new TransactionType();
        $lensa2->transaction_category_id=$kacamata->id;
        $lensa2->name='Lensa Monofocus Cylindris';
        $lensa2->type='One Time 1 Years';
        $lensa2->save();

        $lensa3 = new TransactionType();
        $lensa3->transaction_category_id=$kacamata->id;
        $lensa3->name='Lensa Bifocus Non Cylindris';
        $lensa3->type='One Time 1 Years';
        $lensa3->save();

        $lensa4 = new TransactionType();
        $lensa4->transaction_category_id=$kacamata->id;
        $lensa4->name='Lensa Bifocus Cylindris';
        $lensa4->type='One Time 1 Years';
        $lensa4->save();


        $frame = new TransactionType();
        $frame->transaction_category_id=$kacamata->id;
        $frame->name='Frame';
        $frame->type='One Time 2 Years';
        $frame->save();


    }
}
