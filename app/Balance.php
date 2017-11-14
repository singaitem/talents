<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    public function employee(){
    	return $this->belongsTo(Employee::Class);
    }
    public function TransactionType(){
    	return $this->belongsTo(TransactionType::Class);		
	}
    			
}
