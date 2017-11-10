<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyDetail extends Model
{
    protected $table = 'company_details';

    public function user(){
        return $this->belongsTo(User::class, 'company_id');
    }

    public function image(){
        return $this->belongsTo(ImageModel::class, 'user_id');
    }

    public function townRelation(){
        return $this->belongsTo(Town::class, 'town');
    }

    public function town2Relation(){
        return $this->belongsTo(Town::class, 'town_2');
    }

    public function town3Relation(){
        return $this->belongsTo(Town::class, 'town_3');
    }

    public function categoryRelation(){
        return $this->belongsTo(SubCategories::class, 'category');
    }

    public function category2Relation(){
        return $this->belongsTo(SubCategories::class, 'category_2');
    }

    public function category3Relation(){
        return $this->belongsTo(SubCategories::class, 'category_3');
    }

    public function hours(){
        return $this->hasMany('App\WorkingHours', 'company_det_id','id');
    }
}
