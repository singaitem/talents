<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingRequest extends Model
{
    public function details()
    {
    	return $this->hasMany(SettingRequestDetail::Class);
    }
}
