<?php

namespace Cotizate;

use Illuminate\Database\Eloquent\Model;

class AccessNano extends Model
{
    protected $table = 'access_nanos';


    public function user(){
        return $this->hasOne('Cotizate\User', 'access_nano_id');
    }
}
