<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionCategory extends Model
{
    public function types(){
    	return $this->hasMany(TransactionType::Class);
    }
    	
}
