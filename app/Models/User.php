<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'roles',
    ];

    protected $hidden = [
        'password',
    ];
}
