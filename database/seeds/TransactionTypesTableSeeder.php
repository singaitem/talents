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


        $spd = TransactionCategory::where('name','SPD Advance')->first();
        $spdType = new TransactionType();
        $spdType->transaction_category_id=$spd->id;
        $spdType->name='Ticket';
        $spdType->type='One Time (Transaction)';
        $spdType->save();
        $spdType = new TransactionType();
        $spdType->transaction_category_id=$spd->id;
        $spdType->name='Taxi';
        $spdType->type='One Time (Transaction)';
        $spdType->save();
        $spdType = new TransactionType();
        $spdType->transaction_category_id=$spd->id;
        $spdType->name='Transport';
        $spdType->type='One Time (Transaction)';
        $spdType->save();
        $spdType = new TransactionType();
        $spdType->transaction_category_id=$spd->id;
        $spdType->name='Hotel';
        $spdType->type='One Time (Transaction)';
        $spdType->save();
        $spdType = new TransactionType();
        $spdType->transaction_category_id=$spd->id;
        $spdType->name='Rental Mobil';
        $spdType->type='One Time (Transaction)';
        $spdType->save();
        $spdType = new TransactionType();
        $spdType->transaction_category_id=$spd->id;
        $spdType->name='Mileage';
        $spdType->type='One Time (Transaction)';
        $spdType->save();

        $spdType = new TransactionType();
        $spdType->transaction_category_id=$spd->id;
        $spdType->name='Uang Makan Dalam Negri';
        $spdType->type='One Time (Transaction)';
        $spdType->save();
        $spdType = new TransactionType();
        $spdType->transaction_category_id=$spd->id;
        $spdType->name='Uang Makan Luar Negri';
        $spdType->type='One Time (Transaction)';
        $spdType->save();
        $spdType = new TransactionType();
        $spdType->transaction_category_id=$spd->id;
        $spdType->name='Uang Saku Dalam Negri';
        $spdType->type='One Time (Transaction)';
        $spdType->save();
        $spdType = new TransactionType();
        $spdType->transaction_category_id=$spd->id;
        $spdType->name='Uang Saku Luar Negri';
        $spdType->type='One Time (Transaction)';
        $spdType->save();

        $spdType = new TransactionType();
        $spdType->transaction_category_id=$spd->id;
        $spdType->name='Laundry';
        $spdType->type='One Time (Transaction)';
        $spdType->save();
        $spdType = new TransactionType();
        $spdType->transaction_category_id=$spd->id;
        $spdType->name='Tol Parkir Bensin';
        $spdType->type='One Time (Transaction)';
        $spdType->save();
        $spdType = new TransactionType();
        $spdType->transaction_category_id=$spd->id;
        $spdType->name='Other';
        $spdType->type='One Time (Transaction)';
        $spdType->save();





        $medical = TransactionCategory::where('name','Medical')->first();
        $apotik = new TransactionType();
        $apotik->transaction_category_id=$medical->id;
        $apotik->name='Apotik';
        $apotik->type='1 Years';
        $apotik->save();

        $apotik = new TransactionType();
        $apotik->transaction_category_id=$medical->id;
        $apotik->name='Dokter';
        $apotik->type='1 Years';
        $apotik->save();

        $med = new TransactionType();
        $med->transaction_category_id=$medical->id;
        $med->name='Medical';
        $med->type='1 Years';
        $med->save();

        $med = new TransactionType();
        $med->transaction_category_id=$medical->id;
        $med->name='Medical Overlimit';
        $med->type='1 Years';
        $med->save();

        $wedding = TransactionCategory::where('name','Wedding')->first();
        $wed = new TransactionType();
        $wed->transaction_category_id=$wedding->id;
        $wed->name='Wedding';
        $wed->type='One time';
        $wed->save();
    }
}
