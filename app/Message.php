<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    public function offer(){
        $this->hasOne(Offer::class, 'offer_id');
    }

    public function sender(){
        return $this->belongsTo(User::class, 'sender_client');
    }

    public function reciver(){
        return $this->belongsTo(User::class, 'receive_client');
    }
}