<?php

declare(strict_types=1);

namespace App\Application\Actions\Message;

use App\Application\Actions\Action;
use App\Domain\Message\MessageRepository;
use App\Domain\User\UserRepository;
use Psr\Log\LoggerInterface;

abstract class MessageAction extends Action
{
    protected UserRepository $userRepository;
    protected MessageRepository $messageRepository;

    public function __construct(LoggerInterface $logger, UserRepository $userRepository, MessageRepository $messageRepository)
    {
        parent::__construct($logger);
        $this->userRepository = $userRepository;
        $this->messageRepository = $messageRepository;
    }
}
