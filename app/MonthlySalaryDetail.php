<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthlySalaryDetail extends Model
{
	public function monthlysalary(){
		return $this->belongsTo(MonthlySalary::Class);
	}
	public function element(){
		return $this->belongsTo(Element::Class);
	}
		
		
}
