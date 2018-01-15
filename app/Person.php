<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    //
    protected $table = 'persons';
    public function employee(){
        return $this->belongsTo(Employee::Class);
    }
    public function birthdateformated(){
    	$originalDate = $this->dateofbirth;
		return date("d/m/Y", strtotime($originalDate));
    }
    public function families(){
        return $this->hasMany(Family::Class);
    }
    public function addresses(){
        return $this->hasMany(Address::Class);            
    }
    public function primaryaddress(){
        foreach ($this->addresses as $address) {
            if($address->primary_address==1){
                return $address;
            }
        }
        return null;            
    }
    public function certificates(){
        return $this->hasMany(Certificate::Class);        
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
