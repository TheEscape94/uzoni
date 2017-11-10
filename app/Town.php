<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    protected $table = 'towns';

    public function companyDetail()
    {
        $this->hasOne(CompanyDetail::class);
    }
}
