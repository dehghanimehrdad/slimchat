<?php

declare(strict_types=1);

namespace App\Domain\User;

use JsonSerializable;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';


    protected $fillable = [
        'name', 'email', 'password', 'token'
    ];

    protected $hidden = [
        'password', 'token', 'email'
    ];
}
