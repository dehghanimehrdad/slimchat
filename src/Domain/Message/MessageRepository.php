<?php

declare(strict_types=1);

namespace App\Domain\Message;

use App\Domain\Message\Message;
use Illuminate\Database\Eloquent\Collection;

interface MessageRepository
{
    /**
     * @return Collection
     */
    public function findAllByUserId($userId): Collection;

    /**
     * @param mixed $attributes
     * @return User
     */
    public function create($attributes): Message;
}
