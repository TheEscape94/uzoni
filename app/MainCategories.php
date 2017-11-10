<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainCategories extends Model
{
    protected $table = 'groups';

    public function subGroups(){
        return $this->hasMany('App\SubCategories', 'groups_id','id');
    }
}
