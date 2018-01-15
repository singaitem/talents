<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    public function certificates(){
    	return $this->hasMany(Certificate::Class);
    }
    public function details(){
    	return $this->hasMany(AttachmentDetails::Class);
    }
    	
    	
}
