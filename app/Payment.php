<?php

namespace Cotizate;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function client(){
        return $this->belongsTo('Cotizate\Client', 'client_id');
    }
}
