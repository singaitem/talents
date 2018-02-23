<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingRequestDetail extends Model
{
    public function setting()
    {
    	return $this->belongsTo(SettingRequest::Class,'setting_request_id');
    }
    public function position()
    {
    	return $this->belongsTo(Position::Class);
    }
    public function employee(){
    	return $this->belongsTo(Employee::Class);
    }
    	
}
