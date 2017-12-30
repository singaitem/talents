<?php

use Illuminate\Database\Seeder;
use App\Certificate;
use App\Attachment;
use App\Person;
class CertificatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $per1 = Person::find(1);

        $certif = new Certificate();
        $certif->person_id=$per1->id;
        $certif->no='821891';
        $certif->name='Oracle Certification';
        $certif->type='Lifetime';
        $certif->year='2012';
        $certif->principle='Oracle';
        $certif->description='Java SE Programmer';
        $certif->save();

        $attach = new Attachment();
        $attach->certificate_id=$certif->id;
        $attach->name='oraclecertif.jpg';
        $attach->save();


    }
}
