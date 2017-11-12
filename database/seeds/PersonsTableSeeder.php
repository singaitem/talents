<?php

use Illuminate\Database\Seeder;
use App\Person;

class PersonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $person1 = new Person();
    	$person1->name='Dummy 1';
    	$person1->email='dummy1@mail.com';
    	$person1->dateofbirth='1996-08-01';
    	$person1->address='Jalan Kuning 5 no 3.';
    	$person1->gender='male';
    	$person1->save();

    	$person2 = new Person();
    	$person2->name='Dummy 2';
    	$person2->email='dummy2@mail.com';
    	$person2->dateofbirth='1996-07-01';
    	$person2->address='Jalan Merah 5 no 3.';
    	$person2->gender='male';
    	$person2->save();

    	$person3 = new Person();
    	$person3->name='Dummy 3';
    	$person3->email='dummy3@mail.com';
    	$person3->dateofbirth='1996-06-01';
    	$person3->address='Jalan Ijo 5 no 3.';
    	$person3->gender='female';
    	$person3->save();

        $person4 = new Person();
        $person4->name='Dummy 4';
        $person4->email='dummy4@mail.com';
        $person4->dateofbirth='1996-05-01';
        $person4->address='Jalan Abu 5 no 3.';
        $person4->gender='female';
        $person4->save();
    }
}
