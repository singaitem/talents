<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    public function user(){
        return $this->belongsTo(User::Class);
    }
    public function person(){
        return $this->belongsTo(Person::Class);
    }
    public function company(){
    	return $this->belongsTo(Company::Class);
    }
    public function balances(){
        return $this->hasMany(Balance::Class);
    }
    public function claims(){
        return $this->hasMany(Claim::Class);
    }
    public function position()
    {
        return $this->belongsTo(Position::Class);
    }
    public function supervisor()
    {
        return $this->belongsTo(Employee::Class,'supervisor_id');
    }
    public function subordinate()
    {
        return Employee::where('supervisor_id',$this->id)->get();
    }
    public function monthlysalaries(){
        return $this->hasMany(MonthlySalary::Class);
    }
    public function yearlysalaries(){
        return $this->hasMany(YearlySalary::Class);
    }
    public function notifications(){
        return $this->hasMany(Notification::Class);        
    }
    public function notificationTotal(){
        $total = 0; 
        foreach($this->notifications as $notification){
            $total +=$notification->total;
        }                
        return $total;
    }
                                
        
    
        
        
        
}
