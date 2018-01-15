<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestMarital extends Model
{
    public function person(){
    	return $this->belongsTo(Person::Class);
    }
    public function claim(){
    	return $this->belongsTo(Claim::Class);
    }
}
