<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    public function employees()
    {
    	return $this->hasMany(Employee::Class);
    }
    public function setting_request_detail()
    {
    	return $this->hasMany(SettingRequestDetail::Class);
    }
}
