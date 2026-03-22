<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    use SoftDeletes;

    public function category()
        {
            return $this->belongsTo(Category::class);
        }

    public function brand()
        {
            return $this->belongsTo(Brand::class);
        }

    public function orderdetails()
        {
            return $this->hasMany(OrderDetail::class);
        }
}
