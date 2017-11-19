<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionType extends Model
{
    public function category(){
        return $this->belongsTo(TransactionCategory::Class,'transaction_category_id');
    }
    public function claimDetails(){
    	return $this->hasMany(ClaimDetail::Class);
    }
   	public function balances(){
   		return $this->hasMany(Balance::Class);
   	}
   		
    	
}
