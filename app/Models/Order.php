<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    public function order_item()
    {
        return $this->hasMany('App\Models\OrderItem', 'order_id');
    }
}
