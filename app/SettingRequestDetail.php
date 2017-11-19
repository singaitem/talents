<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingRequestDetail extends Model
{
    public function setting()
    {
    	return $this->belongsTo(SettingRequest::Class);
    }
    public function position()
    {
    	return $this->belongsTo(Position::Class);
    }
}
