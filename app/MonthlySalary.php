<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthlySalary extends Model
{
    public function employee(){
    	return $this->belongsto(Employee::Class);
    }
    public function yearlysalary(){
    	return $this->belongsTo(YearlySalary::Class);
    }
    public function details(){
    	return $this->hasMany(MonthlySalaryDetail::Class);
    }
    	
    	
    	
    	
}
