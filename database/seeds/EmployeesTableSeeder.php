<?php

use Illuminate\Database\Seeder;
use App\Person;
use App\Employee;
use App\Company;
use App\Position;
class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perDummy1 = Person::find(1);
        $perDummy2 = Person::find(2);
        $perDummy3 = Person::find(3);
        $perDummy4 = Person::find(4);


        $comp1= Company::where('code','XYZ123')->first();
        $benefitApproval = Position::where('name','Benefit Approval')->first();
        $benefitSupervisor = Position::where('name','Benefit Supervisor')->first();
        $posIt = Position::where('name','IT Developer')->first();
        $manager = Position::where('name','Manager')->first(); 
        
        
        $emp1 = new Employee();
        $emp1->person_id=$perDummy1->id;
        $emp1->company_id=$comp1->id;
        $emp1->position_id=$posIt->id;
        $emp1->name='00001';
        $emp1->tax_status='TK';
        $emp1->save();

        $emp2 = new Employee();
        $emp2->person_id=$perDummy2->id;
        $emp2->company_id=$comp1->id;
        $emp2->position_id=$benefitSupervisor->id;
        $emp2->name='00002';
        $emp2->tax_status='K1';
        $emp2->save();
        $emp1->supervisor_id=$emp2->id;
        $emp1->save();
        

        $emp3 = new Employee();
        $emp3->person_id=$perDummy3->id;
        $emp3->company_id=$comp1->id;
        $emp3->position_id=$benefitApproval->id;
        $emp3->name='00003';
        $emp3->tax_status='K2';
        $emp3->save();


        $emp4 = new Employee();
        $emp4->person_id=$perDummy4->id;
        $emp4->company_id=$comp1->id;
        $emp4->position_id=$manager->id;
        $emp4->name='00004';
        $emp4->tax_status='TK';
        $emp4->save();
    }
}
