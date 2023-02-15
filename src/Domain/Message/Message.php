<?php

declare(strict_types=1);

namespace App\Domain\Message;

use App\Domain\User\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';


    protected $fillable = [
        'body', 'to_user_id', 'from_user_id'
    ];

    public $appends = ['from_user'];

    public function from_user()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function getFromUserAttribute()
    {
        return $this->from_user()->get();
    }

}
