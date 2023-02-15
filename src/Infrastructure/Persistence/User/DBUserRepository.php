<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\User;

use App\Domain\User\User;
use App\Domain\User\UserNotFoundException;
use App\Domain\User\UserRepository;
use Illuminate\Database\Eloquent\Collection;

class DBUserRepository implements UserRepository
{

    /**
     * {@inheritdoc}
     */
    public function findAll(): Collection
    {
        return User::all();
    }

    /**
     * {@inheritdoc}
     */
    public function findUserOfId(int $id): User
    {
        return User::find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function create($attributes): User
    {
        return User::create($attributes);
    }

    /**
     * {@inheritdoc}
     */
    public function findUserOfEmail(string $email): User
    {
        return User::where('email', $email)->get()->first();
    }

    /**
     * {@inheritdoc}
     */
    public function update(User $user, $attributes): bool
    {
        return $user->update($attributes);
    }

}
