<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    public function company(){
        return $this->belongsTo(Company::class, 'company_id');
    }
}
