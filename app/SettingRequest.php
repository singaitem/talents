<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingRequest extends Model
{
    public function details()
    {
    	return $this->hasMany(SettingRequestDetail::Class);
    }
    public function category(){
    	return $this->belongsTo(Category::Class);
    }
    	
}
