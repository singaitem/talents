<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestAddress extends Model
{
    public function address(){
    	return $this->belongsTo(Address::Class);
    }
    public function claim(){
    	return $this->belongsTo(Claim::Class);
    }
    	
    	
}
