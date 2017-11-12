<?php

use Illuminate\Database\Seeder;
use App\Employee;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$emp1 = Employee::where('name','00001')->first();
    	$emp2 = Employee::where('name','00002')->first();
    	$emp3 = Employee::where('name','00003')->first();

    	$user1= new User();
    	$user1->employee_id=$emp1->id;
    	$user1->email='dummy1@mail.com';
    	$user1->password=bcrypt('dummy1');
        $user1->save();

        $user2= new User();
    	$user2->employee_id=$emp2->id;
    	$user2->email='dummy2@mail.com';
    	$user2->password=bcrypt('dummy2');
        $user2->save();

        $user3= new User();
    	$user3->employee_id=$emp3->id;
    	$user3->email='dummy3@mail.com';
    	$user3->password=bcrypt('dummy3');
        $user3->save();

    }
}
