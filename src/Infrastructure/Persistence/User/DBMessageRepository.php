<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\User;

use App\Domain\Message\Message;
use App\Domain\Message\MessageRepository;
use Illuminate\Database\Eloquent\Collection;

class DBMessageRepository implements MessageRepository
{

    /**
     * {@inheritdoc}
     */
    public function findAllByUserId($userId): Collection
    {
        return Message::where('to_user_id', $userId)->orWhere('from_user_id', $userId)->orderBy('created_at', 'DESC')->get();
    }

    /**
     * {@inheritdoc}
     */
    public function create($attributes): Message
    {
        return Message::create($attributes);
    }

}
