<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkingHours extends Model
{
    protected $table = 'working_hours';

    public function company(){
        return $this->belongsTo(CompanyDetail::class, 'working_hours_id');
    }
}