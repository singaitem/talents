<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestFamily extends Model
{
    public function family(){
    	return $this->belongsTo(Family::Class);
    }
    public function claim(){
    	return $this->belongsTo(Claim::Class);
    }
}
