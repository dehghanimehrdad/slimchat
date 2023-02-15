<?php

declare(strict_types=1);

namespace App\Application\Actions\Message;

use Psr\Http\Message\ResponseInterface as Response;

class ListMessagesAction extends MessageAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $user = $this->userRepository->findUserOfToken($this->request->getHeader('Authorization')[0]);

        $messages = $this->messageRepository->findAllByUserId($user->id);
        
        return $this->respondWithData($messages);
    }

}
