<?php

use Illuminate\Database\Seeder;
use App\Person;
use App\Address;
use App\HomeBase;
class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$per1 = Person::find(1);
    	$per2 = Person::find(2);
    	$per3 = Person::find(3);
    	$per4 = Person::find(4);

    	$jakarta = HomeBase::where('name','DKI Jakarta')->first();

    	$address = new Address();
    	$address->person_id = $per1->id;
    	$address->name='Jalan Kuning 5 no 3.';
    	$address->homebase_id=$jakarta->id;
    	$address->district='Jati Kramat';
    	$address->subdistrict='Jati Asih';
    	$address->rt='12';
    	$address->rw='13';
    	$address->stay_status='Live With Parents';
    	$address->zip_code='13133';
    	$address->primary_address=true;
    	$address->save();


    	$address = new Address();
    	$address->person_id = $per2->id;
    	$address->name='Jalan Merah 5 no 3.';
    	$address->homebase_id=$jakarta->id;
    	$address->district='Cawang';
    	$address->subdistrict='Cawang Barat';
    	$address->rt='12';
    	$address->rw='13';
    	$address->stay_status='Contract';
    	$address->zip_code='13133';
    	$address->primary_address=true;
    	$address->save();

    	$address = new Address();
    	$address->person_id = $per3->id;
    	$address->name='Jalan Ijo 5 no 3.';
    	$address->homebase_id=$jakarta->id;
    	$address->district='Kuningan';
    	$address->subdistrict='Kuningan Merah';
    	$address->rt='12';
    	$address->rw='13';
    	$address->stay_status='Owned';
    	$address->zip_code='13133';
    	$address->primary_address=true;
    	$address->save();

    	$address = new Address();
    	$address->person_id = $per4->id;
    	$address->name='Jalan Abu 5 no 3.';
    	$address->homebase_id=$jakarta->id;
    	$address->district='Pasar Minggu';
    	$address->subdistrict='Pasar Minggu Selatan';
    	$address->rt='12';
    	$address->rw='13';
    	$address->stay_status='Owned';
    	$address->zip_code='13133';
    	$address->primary_address=true;
    	$address->save();

    }
}
