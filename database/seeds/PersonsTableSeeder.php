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
    	$person1->name='Alexander Pierce';
    	$person1->email='dummy1@mail.com';
    	$person1->dateofbirth='1996-08-01';
    	$person1->address='Jalan Kuning 5 no 3.';
    	$person1->gender='male';
        $person1->marital='single';
        $person1->phone_number='0812345678910';
        $person1->picture='user1-128x128.jpg';
    	$person1->save();

    	$person2 = new Person();
    	$person2->name='John Doe';
    	$person2->email='dummy2@mail.com';
    	$person2->dateofbirth='1996-07-01';
    	$person2->address='Jalan Merah 5 no 3.';
    	$person2->gender='male';
        $person2->marital='married';
        $person2->phone_number='0812345678911';
        $person2->picture='user2-160x160.jpg';
    	$person2->save();

    	$person3 = new Person();
    	$person3->name='Dummy 3';
    	$person3->email='dummy3@mail.com';
    	$person3->dateofbirth='1996-06-01';
    	$person3->address='Jalan Ijo 5 no 3.';
    	$person3->gender='female';
        $person3->marital='married';
        $person3->phone_number='0812345678912';
        $person3->picture='user3-128x128.jpg';
    	$person3->save();

        $person4 = new Person();
        $person4->name='Dummy 4';
        $person4->email='dummy4@mail.com';
        $person4->dateofbirth='1996-05-01';
        $person4->address='Jalan Abu 5 no 3.';
        $person4->gender='female';
        $person4->marital='single';
        $person4->phone_number='0812345678913';
        $person4->picture='user4-128x128.jpg';
        $person4->save();

    }
}
