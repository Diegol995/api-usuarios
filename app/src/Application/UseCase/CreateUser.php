<?php

namespace App\Application\UseCase;

use App\Domain\Entity\User;
use App\Domain\Repository\UserRepositoryInterface;

class CreateUser
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {
    }

    public function execute(string $name, string $email): User
    {
        $user = new User($name, $email);
        $this->userRepository->save($user);

        return $user;
    }
}
