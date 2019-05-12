<?php

namespace Cotizate;

use Illuminate\Database\Eloquent\Model;

class UserNano extends Model
{
    public function users(){
        return $this->hasMany('\Cotizate\User', 'user_nano_id');
    }
}
