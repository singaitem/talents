<?php

use Illuminate\Database\Seeder;
use App\Family;
use App\Person;
class FamiliesTableSeeder extends Seeder
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

    	$family = new Family();
    	$family->person_id = $per1->id;
    	$family->relationship = 'Father';
    	$family->name='Martel Pierce';
    	$family->placeofbirth='Bandung';
    	$family->dateofbirth='1955-08-01';
    	$family->alive_status='Alive';
    	$family->gender='Male';
    	$family->marital_status='Married';
    	$family->address='Jalan palapa no 21.';
        $family->save();

        $family = new Family();
    	$family->person_id = $per1->id;
    	$family->relationship = 'Mother';
    	$family->name='Megan Shi';
    	$family->placeofbirth='Bandung';
    	$family->dateofbirth='1956-08-01';
    	$family->alive_status='Alive';
    	$family->gender='Female';
    	$family->marital_status='Married';
    	$family->address='Jalan palapa no 21.';
        $family->save();

        $family = new Family();
    	$family->person_id = $per2->id;
    	$family->relationship = 'Wife';
    	$family->name='Cathy Zannella';
    	$family->placeofbirth='Jakarta';
    	$family->dateofbirth='1985-08-01';
    	$family->alive_status='Alive';
    	$family->gender='Female';
    	$family->marital_status='Married';
    	$family->address='Jalan karuhun no 21.';
        $family->save();



        $family = new Family();
    	$family->person_id = $per3->id;
    	$family->relationship = 'Husband';
    	$family->name='Gabriel Wescott';
    	$family->placeofbirth='Jakarta';
    	$family->dateofbirth='1985-10-01';
    	$family->alive_status='Alive';
    	$family->gender='Male';
    	$family->marital_status='Married';
    	$family->address='Jalan mistako no 21.';
        $family->save();

        $family = new Family();
    	$family->person_id = $per3->id;
    	$family->relationship = 'Child';
    	$family->name='Marx Wescott';
    	$family->placeofbirth='Jakarta';
    	$family->dateofbirth='2001-10-01';
    	$family->alive_status='Alive';
    	$family->gender='Male';
    	$family->marital_status='Married';
    	$family->address='Jalan mistako no 21.';
        $family->save();



        $family = new Family();
    	$family->person_id = $per4->id;
    	$family->relationship = 'Father';
    	$family->name='Sinclair Guereca';
    	$family->placeofbirth='Jongol';
    	$family->dateofbirth='1955-03-14';
    	$family->alive_status='Alive';
    	$family->gender='Male';
    	$family->marital_status='Married';
    	$family->address='Jalan kakurata no 21.';
        $family->save();

        $family = new Family();
    	$family->person_id = $per4->id;
    	$family->relationship = 'Mother';
    	$family->name='Sonya Trainor';
    	$family->placeofbirth='Jongol';
    	$family->dateofbirth='1956-04-15';
    	$family->alive_status='Alive';
    	$family->gender='Female';
    	$family->marital_status='Married';
    	$family->address='Jalan kakurata no 21.';
        $family->save();


    }
}
