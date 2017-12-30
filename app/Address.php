<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function person(){
    	return $this->belongsTo(Person::Class);
    }
    public function homebase(){
        return $this->belongsTo(HomeBase::Class);
    }
    
    			
}
