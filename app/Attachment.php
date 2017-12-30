<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    public function certificate(){
    	return $this->belongsTo(Certificate::Class);
    }
    	
}
