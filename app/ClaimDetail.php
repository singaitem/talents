<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClaimDetail extends Model
{
    public function claim(){
    	return $this->belongsTo(Claim::Class);
    }
    public function transaction_type(){
    	return $this->belongsTo(TransactionType::Class);
    }
    	
    	
}
