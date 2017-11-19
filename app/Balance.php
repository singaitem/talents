<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    public function employee(){
    	return $this->belongsTo(Employee::Class);
    }
    public function transaction_category()
    {
    	return $this->belongsTo(TransactionCategory::Class);
    }
    public function details()
    {
    	return $this->hasMany(BalanceDetail::Class);
    }
    public function findDetail($detailName)
    {
        foreach($this->details as $detail ){
            if($detail->transaction_type->name==$detailName){
                return $detail;
            }
        }
        return null;                    
    }    		
}
