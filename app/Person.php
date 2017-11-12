<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    //
    protected $table = 'persons';
    public function employee(){
        return $this->belongsTo(Employee::Class);
    }
}
