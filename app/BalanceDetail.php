<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BalanceDetail extends Model
{
	public function balance()
	{
		return $this->belongsTo(Balance::Class);
	}
    public function transaction_type(){
    	return $this->belongsTo(TransactionType::Class);		
	}
}
