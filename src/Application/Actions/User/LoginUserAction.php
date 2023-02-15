<?php

declare(strict_types=1);

namespace App\Application\Actions\User;

use Psr\Http\Message\ResponseInterface as Response;

class LoginUserAction extends UserAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $user = $this->userRepository->findUserOfEmail($this->request->getParsedBody()['email']);
        if($user->password == $this->request->getParsedBody()['password']){
            $token = $this->generate_token();
            $this->userRepository->update($user, ['token' => $token]);
            return $this->respondWithData($token);
        }

        return $this->respondWithData(['Not authenticated'], 403);
    }

    private function generate_token($length = 30)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
