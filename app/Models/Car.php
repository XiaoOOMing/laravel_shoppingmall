<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'car';

    public $timestamps = false;

    // 关联产品表
    public function product()
    {
        return $this->belongsTo('App\Models\Products', 'product_id');
    }
}
