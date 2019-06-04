<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function user()     
    {         
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    public function category()     
    {         
        return $this->belongsToMany(Category::class);
    }
}
