<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    //
    protected $table = 'order';

    use SoftDeletes;

    public function orderdetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
