<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    use SoftDeletes;

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
