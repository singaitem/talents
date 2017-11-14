<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    public function details(){
    	return $this->hasMany(ClaimDetails::Class);
    }
   	public function employee(){
   		return $this->belongsTo(Employee::Class);
   	}
   		
}
