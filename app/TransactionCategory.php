<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionCategory extends Model
{
    public function types(){
    	return $this->hasMany(TransactionType::Class);
    }
    public function claims(){
    	return $this->hasMany(Claim::Class);
    }
    	
    	
}
