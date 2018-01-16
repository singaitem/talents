<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    public function person(){
    	return $this->belongsTo(Person::Class,'person_id');
    }
    public function attachment(){
    	return $this->belongsTo(Attachment::Class);
    }
    	
    	
}
