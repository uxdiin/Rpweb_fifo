<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['id_pengirim','item_penerima','id_item'];
    public function item(){
        return $this->belongsto(Item::class,'id_item','id');
    }
    public function penerima(){
        return $this->belongsTo(User::class,'id_penerima','id');
    }
    public function pengirim(){
        return $this->belongsTo(User::class,'id_pengirim','id');
    }
}
