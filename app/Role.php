<?php

namespace Cotizate;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users(){
        return $this->hasMany('Cotizate\User');
    }
}
