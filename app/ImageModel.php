<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageModel extends Model
{
    protected $table = 'optional_images';

    public function companyDetail()
    {
        $this->hasOne(CompanyDetail::class);
    }
}
