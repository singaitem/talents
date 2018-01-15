<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestCertificate extends Model
{
    public function certificate(){
    	return $this->belongsTo(Certificate::Class);
    }
    public function claim(){
    	return $this->belongsTo(Claim::Class);
    }
}
