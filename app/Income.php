<?php

namespace Cotizate;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $table = 'incomes';

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'jan' => 0,
        'feb' => 0,
        'mar' => 0,
        'apr' => 0,
        'may' => 0,
        'jun' => 0,
        'jul' => 0,
        'ago' => 0,
        'sep' => 0,
        'oct' => 0,
        'nov' => 0,
        'dec' => 0,
        'total' => 0
    ];

    public function user(){
        return $this->belongsTo('\Cotizate\User', 'user_id');
    }
}
