<?php

use Illuminate\Database\Seeder;
use App\Employee;
use App\MonthlySalary;
use App\MonthlySalaryDetail;
use App\YearlySalary;
use App\YearlySalaryDetail;
use App\Element;
class SalariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $emp1 = Employee::find(1);
        $tgapok = Element::where('name','Gaji Pokok')->first();
        $tastek = Element::where('name','Tunjangan ASTEK')->first();
        $tbunga = Element::where('name','Tunjangan Bunga')->first();
        $tmakan = Element::where('name','Tunjangan Makan')->first();
        $tobat = Element::where('name','Tunjangan Obat')->first();
        $tbpjsk = Element::where('name','Tunjangan Premi BPJS Kesehatan Employer')->first();
        $ttransport = Element::where('name','Tunjangan Transport')->first();
        $tpajak = Element::where('name','Tunjangan Pajak')->first();



        $pikoperasi = Element::where('name','Iuran Koperasi')->first();
        $pbjsk = Element::where('name','Potongan BPJS Kesehatan')->first();
        $pbpjtkjp = Element::where('name','Potongan BPJS TK JP Employee')->first();
        $ppensiun = Element::where('name','Potongan Pensiun')->first();
        $psoftloan= Element::where('name','Potongan Soft Loan')->first();
        $pastek = Element::where('name','Potongan Tunj ASTEK')->first();
        $pobat = Element::where('name','Uang Muka Obat')->first();
        $ppajak = Element::where('name','Potongan Pajak')->first();

        $yearly = new YearlySalary();
        $yearly->employee_id=$emp1->id;
        $yearly->total_take_home_pay=5337418;
        $yearly->total_allowance=11277861;
        $yearly->total_deduction=5940443;
        $yearly->period='2017';
        $yearly->effective_month='12';
        $yearly->current_month='12';
        $yearly->save();

        $monthly = new MonthlySalary();
        $monthly->employee_id=$emp1->id;
        $monthly->yearly_salary_id=$yearly->id;
        $monthly->take_home_pay=5337418;
        $monthly->total_allowance=11277861;
        $monthly->total_deduction=5940443;
        $monthly->payment_start_date='2017-12-25';
        $monthly->period='December - 2017';
        $monthly->save();

        $monthlydetail = new MonthlySalaryDetail();
        $monthlydetail->monthly_salary_id=$monthly->id;
        $monthlydetail->element_id=$tgapok->id;
        $monthlydetail->value=7206000;
        $monthlydetail->save();


        $monthlydetail = new MonthlySalaryDetail();
        $monthlydetail->monthly_salary_id=$monthly->id;
        $monthlydetail->element_id=$tastek->id;
        $monthlydetail->value=38912;
        $monthlydetail->save();

        $monthlydetail = new MonthlySalaryDetail();
        $monthlydetail->monthly_salary_id=$monthly->id;
        $monthlydetail->element_id=$tbunga->id;
        $monthlydetail->value=314000;
        $monthlydetail->save();

        $monthlydetail = new MonthlySalaryDetail();
        $monthlydetail->monthly_salary_id=$monthly->id;
        $monthlydetail->element_id=$tmakan->id;
        $monthlydetail->value=432000;
        $monthlydetail->save();

        $monthlydetail = new MonthlySalaryDetail();
        $monthlydetail->monthly_salary_id=$monthly->id;
        $monthlydetail->element_id=$tobat->id;
        $monthlydetail->value=989000;
        $monthlydetail->save();

        $monthlydetail = new MonthlySalaryDetail();
        $monthlydetail->monthly_salary_id=$monthly->id;
        $monthlydetail->element_id=$tbpjsk->id;
        $monthlydetail->value=288240;
        $monthlydetail->save();

        $monthlydetail = new MonthlySalaryDetail();
        $monthlydetail->monthly_salary_id=$monthly->id;
        $monthlydetail->element_id=$ttransport->id;
        $monthlydetail->value=954000;
        $monthlydetail->save();

        $monthlydetail = new MonthlySalaryDetail();
        $monthlydetail->monthly_salary_id=$monthly->id;
        $monthlydetail->element_id=$tpajak->id;
        $monthlydetail->value=1055709;
        $monthlydetail->save();

        $monthlydetail = new MonthlySalaryDetail();
        $monthlydetail->monthly_salary_id=$monthly->id;
        $monthlydetail->element_id=$pikoperasi->id;
        $monthlydetail->value=1000;
        $monthlydetail->save();

        $monthlydetail = new MonthlySalaryDetail();
        $monthlydetail->monthly_salary_id=$monthly->id;
        $monthlydetail->element_id=$pbjsk->id;
        $monthlydetail->value=360300;
        $monthlydetail->save();

        $monthlydetail = new MonthlySalaryDetail();
        $monthlydetail->monthly_salary_id=$monthly->id;
        $monthlydetail->element_id=$pbpjtkjp->id;
        $monthlydetail->value=72060;
        $monthlydetail->save();

        $monthlydetail = new MonthlySalaryDetail();
        $monthlydetail->monthly_salary_id=$monthly->id;
        $monthlydetail->element_id=$ppensiun->id;
        $monthlydetail->value=230592;
        $monthlydetail->save();

        $monthlydetail = new MonthlySalaryDetail();
        $monthlydetail->monthly_salary_id=$monthly->id;
        $monthlydetail->element_id=$psoftloan->id;
        $monthlydetail->value=1827000;
        $monthlydetail->save();

        $monthlydetail = new MonthlySalaryDetail();
        $monthlydetail->monthly_salary_id=$monthly->id;
        $monthlydetail->element_id=$pastek->id;
        $monthlydetail->value=183032;
        $monthlydetail->save();

        $monthlydetail = new MonthlySalaryDetail();
        $monthlydetail->monthly_salary_id=$monthly->id;
        $monthlydetail->element_id=$pobat->id;
        $monthlydetail->value=989000;
		$monthlydetail->save();

        $monthlydetail = new MonthlySalaryDetail();
        $monthlydetail->monthly_salary_id=$monthly->id;
        $monthlydetail->element_id=$ppajak->id;
        $monthlydetail->value=2277459;
        $monthlydetail->save();

    }
}
