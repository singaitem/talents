<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestDetail extends Model
{
    public function request(){
    	return $this->belongsTo(Request::Class);
    }
    public function employee(){
    	return $this->belongsTo(Employee::Class);
    }
    	
    	
}
