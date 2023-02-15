<?php

declare(strict_types=1);

use App\Domain\Message\MessageRepository;
use App\Domain\User\UserRepository;
use App\Infrastructure\Persistence\User\DBMessageRepository;
use App\Infrastructure\Persistence\User\DBUserRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our UserRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        UserRepository::class => \DI\autowire(DBUserRepository::class),
        MessageRepository::class => \DI\autowire(DBMessageRepository::class),
    ]);
};
