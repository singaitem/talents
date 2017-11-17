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
    	
    	
}
