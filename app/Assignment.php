<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    public function company(){
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function checker(){
        return $this->belongsTo(Checker::class, 'checker_id');
    }

    public function kuisioner(){
        return $this->hasMany(Kuisioner::class, 'assignment_code');
    }
}
