<?php

declare(strict_types=1);

namespace App\Application\Actions\Message;

use Psr\Http\Message\ResponseInterface as Response;

class SendMessageAction extends MessageAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $user = $this->userRepository->findUserOfToken($this->request->getHeader('Authorization')[0]);

        $to_user_id = $this->request->getParsedBody()['to_user'];
        $user = $this->userRepository->findUserOfId((int) $to_user_id);


        $body = $this->request->getParsedBody()['body'];

        $message = $this->messageRepository->create([
            'from_user_id' => $user->id,
            'to_user_id' => $to_user_id,
            'body' => $body,
        ]);

        return $this->respondWithData($message);
    }
}
