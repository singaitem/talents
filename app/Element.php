<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    public function monthlysalarydetails(){
    	return $this->hasMany(MonthlySalaryDetail::Class);
    }
    public function yearlysalarydetails(){
    	return $this->hasMany(YearlySalaryDetail::Class);
    }
    	
    	
}
