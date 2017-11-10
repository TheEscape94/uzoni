<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    protected $table = 'subgroups';

    public function myGroup(){
        return $this->belongsTo(MainCategories::class);
    }

    public function companyDetail(){
        $this->hasOne(CompanyDetail::class);
    }
}
