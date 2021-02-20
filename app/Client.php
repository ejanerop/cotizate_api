<?php

namespace Cotizate;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function allPayments(){
        return $this->hasMany('Cotizate\Payment');
    }

    public function payments(){
        return $this->hasMany('Cotizate\Payment')->where('year', '2021');
    }
}
