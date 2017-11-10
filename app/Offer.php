<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'offers';

    public function message(){
        return $this->belongsTo(Message::class, 'offer_id');
    }
}