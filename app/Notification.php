<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
	public function employee(){
		return $this->belongsTo(Employee::Class);    	
    }
	    	    
}
