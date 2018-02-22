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
    		if($detail->status=='Waiting'){
    			if(auth()->user()->employee->id == $detail->request_to || auth()->user()->employee->position->id==$detail->request_to_position){
    				return $detail;
    			}
    		}
    		
    	}		
    	return null;
	}
    public function getNextWaitingRequestAuth(){
        $hasWaitingNext = false;
        foreach($this->details as $detail){
            if($hasWaitingNext==true){
                return $detail;
            }
            if($detail->status=='Waiting'){
                if(auth()->user()->employee->id == $detail->request_to || auth()->user()->employee->position->id==$detail->request_to_position){
                    $hasWaitingNext=true;
                    continue;
                }
            }
            
        }       
        return null;
    }
    public function hasPending(){
        foreach($this->details as $detail){
            if(auth()->user()->employee->id == $detail->request_to || auth()->user()->employee->position->id==$detail->request_to_position){
                if($detail->status=='Pending'){
                    return true;
                }
            }
        }
        return false;
    }
    public function hasApprove(){
        foreach($this->details as $detail){
            if($detail->status=='Approved'){
                    return true;
                }
        }
        return false;
    }
        
        
    public function requestAddresses(){
        return $this->hasMany(RequestAddress::Class);
    }
    public function requestCertificates(){
        return $this->hasMany(RequestCertificate::Class);
    }
    public function requestFamilies(){
        return $this->hasMany(RequestFamily::Class);
    }
    public function requestMaritals(){
        return $this->hasMany(RequestMarital::Class);
    }
        
        
        
    			
    	
}
