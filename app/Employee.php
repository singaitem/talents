<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    public function user(){
        return $this->belongsTo(User::Class);
    }
    public function person(){
        return $this->belongsTo(Person::Class);
    }
    public function company(){
    	return $this->belongsTo(Company::Class);
    }
    public function balances(){
        return $this->hasMany(Balance::Class);
    }
    public function claims(){
        return $this->hasMany(Claim::Class);
    }
        
        
}
