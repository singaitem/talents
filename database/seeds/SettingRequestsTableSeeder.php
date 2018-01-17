<?php

use Illuminate\Database\Seeder;
use App\SettingRequest;
use App\SettingRequestDetail;
use App\TransactionCategory;
use App\Position;
class SettingRequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$benefitapproval = Position::where('name','Benefit Approval')->first();
        $manager = Position::where('name','Manager')->first();
    	$kacamata = TransactionCategory::where('name','Kacamata')->first();
        $marital = TransactionCategory::where('name','Change Marital Status')->first();
        $family = TransactionCategory::where('name','Family')->first();
        $address = TransactionCategory::where('name','Address')->first();
        $certificate = TransactionCategory::where('name','Certificate')->first();
        $medical = TransactionCategory::where('name','Medical')->first();
        $medicaloverlimit = TransactionCategory::where('name','Medical Overlimit')->first();
        $businesstravel = TransactionCategory::where('name','Business Travel')->first();
        $spdadvance = TransactionCategory::where('name','SPD Advance')->first();
        $wedding = TransactionCategory::where('name','Wedding')->first();

        //type 1 = Supervisor
        //type 2 = Position
        //type 3 = Employee No

    	$setting = new SettingRequest();
    	$setting->category_id=$kacamata->id;
     	$setting->save();

     	$settingDetail = new SettingRequestDetail();
     	$settingDetail->setting_request_id = $setting->id;
     	$settingDetail->type=1;
     	$settingDetail->save();

     	$settingDetail2 = new SettingRequestDetail();
     	$settingDetail2->setting_request_id = $setting->id;
     	$settingDetail2->type=2;
     	$settingDetail2->position_id = $benefitapproval->id;
     	$settingDetail2->save();

        //Marital
        $setting = new SettingRequest();
        $setting->category_id=$marital->id;
        $setting->save();

        $settingDetail = new SettingRequestDetail();
        $settingDetail->setting_request_id = $setting->id;
        $settingDetail->type=1;
        $settingDetail->save();


        //Family
        $setting = new SettingRequest();
        $setting->category_id=$family->id;
        $setting->save();

        $settingDetail = new SettingRequestDetail();
        $settingDetail->setting_request_id = $setting->id;
        $settingDetail->type=1;
        $settingDetail->save();


        //Address
        $setting = new SettingRequest();
        $setting->category_id=$address->id;
        $setting->save();

        $settingDetail = new SettingRequestDetail();
        $settingDetail->setting_request_id = $setting->id;
        $settingDetail->type=1;
        $settingDetail->save();

        //Certificate
        $setting = new SettingRequest();
        $setting->category_id=$certificate->id;
        $setting->save();

        $settingDetail = new SettingRequestDetail();
        $settingDetail->setting_request_id = $setting->id;
        $settingDetail->type=1;
        $settingDetail->save();

        //Medical
        $setting = new SettingRequest();
        $setting->category_id=$medical->id;
        $setting->save();

        $settingDetail = new SettingRequestDetail();
        $settingDetail->setting_request_id = $setting->id;
        $settingDetail->type=1;
        $settingDetail->save();

        $settingDetail2 = new SettingRequestDetail();
        $settingDetail2->setting_request_id = $setting->id;
        $settingDetail2->type=2;
        $settingDetail2->position_id = $benefitapproval->id;
        $settingDetail2->save();

        $settingDetail2 = new SettingRequestDetail();
        $settingDetail2->setting_request_id = $setting->id;
        $settingDetail2->type=2;
        $settingDetail2->position_id = $manager->id;
        $settingDetail2->save();

        //Medical Overlimit
        $setting = new SettingRequest();
        $setting->category_id=$medicaloverlimit->id;
        $setting->save();

        $settingDetail = new SettingRequestDetail();
        $settingDetail->setting_request_id = $setting->id;
        $settingDetail->type=3;
        $settingDetail->employee_id='00002';
        $settingDetail->save();

        //SPD Advance
        $setting = new SettingRequest();
        $setting->category_id=$spdadvance->id;
        $setting->save();

        $settingDetail = new SettingRequestDetail();
        $settingDetail->setting_request_id = $setting->id;
        $settingDetail->type=1;
        $settingDetail->save();

        $settingDetail2 = new SettingRequestDetail();
        $settingDetail2->setting_request_id = $setting->id;
        $settingDetail2->type=2;
        $settingDetail2->position_id = $benefitapproval->id;
        $settingDetail2->save();

        $settingDetail2 = new SettingRequestDetail();
        $settingDetail2->setting_request_id = $setting->id;
        $settingDetail2->type=2;
        $settingDetail2->position_id = $manager->id;
        $settingDetail2->save();

        //Business Travel
        $setting = new SettingRequest();
        $setting->category_id=$businesstravel->id;
        $setting->save();

        $settingDetail = new SettingRequestDetail();
        $settingDetail->setting_request_id = $setting->id;
        $settingDetail->type=1;
        $settingDetail->save();

        $settingDetail2 = new SettingRequestDetail();
        $settingDetail2->setting_request_id = $setting->id;
        $settingDetail2->type=2;
        $settingDetail2->position_id = $benefitapproval->id;
        $settingDetail2->save();

        $settingDetail2 = new SettingRequestDetail();
        $settingDetail2->setting_request_id = $setting->id;
        $settingDetail2->type=2;
        $settingDetail2->position_id = $manager->id;
        $settingDetail2->save();

        //Wedding
        $setting = new SettingRequest();
        $setting->category_id=$wedding->id;
        $setting->save();

        $settingDetail = new SettingRequestDetail();
        $settingDetail->setting_request_id = $setting->id;
        $settingDetail->type=1;
        $settingDetail->save();

        $settingDetail2 = new SettingRequestDetail();
        $settingDetail2->setting_request_id = $setting->id;
        $settingDetail2->type=2;
        $settingDetail2->position_id = $benefitapproval->id;
        $settingDetail2->save();

        $settingDetail2 = new SettingRequestDetail();
        $settingDetail2->setting_request_id = $setting->id;
        $settingDetail2->type=2;
        $settingDetail2->position_id = $manager->id;
        $settingDetail2->save();




























    }
}
