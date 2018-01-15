<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttachmentDetail extends Model
{
    public function attachment(){
    	return $this->belongsTo(Attachment::Class);
    }
    	
}
