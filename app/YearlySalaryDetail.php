<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YearlySalaryDetail extends Model
{
    public function yearlysalary(){
    	return $this->belongsTo(YearlySalary::Class);
    }
    public function element(){
		return $this->belongsTo(Element::Class);
	}
    	
    	
}
