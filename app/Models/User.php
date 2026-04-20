<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;

    protected $table = 'user';

    protected $fillable = [
        'name',
        'username',
        'email',
        'phone',
        'password',
        'address',
        'image',
        'status',
    ];

    protected $hidden = [
        'password',
    ];
}
