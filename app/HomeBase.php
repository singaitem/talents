<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeBase extends Model
{
	public function addresses(){
   		return $this->hasMany(Address::Class);
   	}
   	
}
