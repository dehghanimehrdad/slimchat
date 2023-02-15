<?php

declare(strict_types=1);

namespace App\Domain\User;

use Illuminate\Database\Eloquent\Collection;

interface UserRepository
{
    /**
     * @return Collection
     */
    public function findAll(): Collection;

    /**
     * @param int $id
     * @return User
     * @throws UserNotFoundException
     */
    public function findUserOfId(int $id): User;

    /**
     * @param string $email
     * @return User
     * @throws UserNotFoundException
     */
    public function findUserOfEmail(string $email): User;

    /**
     * @param string $email
     * @return User
     * @throws UserNotFoundException
     */
    public function findUserOfToken(string $token): User;
    

    /**
     * @param mixed $attributes
     * @return User
     */
    public function create($attributes): User;

    /**
     * @param mixed $attributes
     * @return User
     */
    public function update(User $user, $attributes): bool;
}
