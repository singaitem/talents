<?php

use Illuminate\Database\Seeder;
use App\Certificate;
use App\Attachment;
use App\Person;
use App\AttachmentDetail;
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


        $attach = new Attachment();
        $attach->name='Attachment Certificate';
        $attach->save();

        $attachmentDetail = new AttachmentDetail();
        $attachmentDetail->attachment_id=$attach->id;
        $attachmentDetail->name='oraclecertif.jpg';
        $attachmentDetail->save();

        $certif = new Certificate();
        $certif->attachment_id=$attach->id;
        $certif->person_id=$per1->id;
        $certif->no='821891';
        $certif->name='Oracle Certification';
        $certif->type='Lifetime';
        $certif->year='2012';
        $certif->principle='Oracle';
        $certif->description='Java SE Programmer';
        $certif->save();


    }
}
