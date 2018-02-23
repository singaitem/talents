<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    public function details(){
    	return $this->hasMany(ClaimDetail::Class);
    }
   	public function employee(){
   		return $this->belongsTo(Employee::Class);
   	}
   	public function request(){
   		return $this->belongsTo(Request::Class);
   	}
    public function transaction_category(){
      return $this->belongsTo(TransactionCategory::Class);
    }
    public function attachments(){
      return $this->hasMany(ClaimAttachment::Class);
    }
    public function request_family(){
      return $this->hasMany(RequestFamily::Class);
    }
    public function request_address(){
      return $this->hasMany(RequestAddress::Class);
    }
    public function request_certificate(){
      return $this->hasMany(RequestCertificate::Class);
    }
      
      
      
      
      
   		
}
