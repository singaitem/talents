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
    	$kacamata = TransactionCategory::where('name','Kacamata')->first();
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

    }
}
