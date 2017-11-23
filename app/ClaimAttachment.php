<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClaimAttachment extends Model
{
    public function claim(){
    	return $this->belongsTo(Claim::Class);
    }
    	
}
