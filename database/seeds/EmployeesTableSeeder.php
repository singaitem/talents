<?php

use Illuminate\Database\Seeder;
use App\Person;
use App\Employee;
use App\Company;
class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perDummy1 = Person::where('name','Dummy 1')->first();
        $perDummy2 = Person::where('name','Dummy 2')->first();
        $perDummy3 = Person::where('name','Dummy 3')->first();
        $perDummy4 = Person::where('name','Dummy 4')->first();


        $comp1= Company::where('code','XYZ123')->first();

        $emp1 = new Employee();
        $emp1->person_id=$perDummy1->id;
        $emp1->company_id=$comp1->id;
        $emp1->name='00001';
        $emp1->save();

        $emp2 = new Employee();
        $emp2->person_id=$perDummy2->id;
        $emp2->company_id=$comp1->id;
        $emp2->name='00002';
        $emp2->save();

        $emp3 = new Employee();
        $emp3->person_id=$perDummy3->id;
        $emp3->company_id=$comp1->id;
        $emp3->name='00003';
        $emp3->save();


        $emp3 = new Employee();
        $emp3->person_id=$perDummy4->id;
        $emp3->company_id=$comp1->id;
        $emp3->name='00004';
        $emp3->save();
    }
}
