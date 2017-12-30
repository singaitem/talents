<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    public function person(){
    	return $this->belongsTo(Person::Class);
    }
    	
}
