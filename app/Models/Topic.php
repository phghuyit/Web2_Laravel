<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    //
    use SoftDeletes;
    
    protected $table = 'topic';
    public function posts()
{
    return $this->hasMany(Post::class);
}
}
