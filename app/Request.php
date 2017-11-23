<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    public function claim(){
    	return $this->belongsTo(Claim::Class);
    }
    public function details(){
    	return $this->hasMany(RequestDetail::Class);
    }
    public function getWaitingRequestAuth(){
    	foreach($this->details as $detail){
    		if($detail->status!='Waiting'){
    			if(auth()->user()->employee->id == $detail->request_to){
    				return $detail;
    			}
    		}
    		
    	}		
    	return null;
	}
    			
    	
}
