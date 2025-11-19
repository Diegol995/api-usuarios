<?php

namespace App\Application\UseCase;

use App\Application\DTO\UserResponse;
use App\Domain\Repository\UserRepositoryInterface;

class ListUsersUseCase
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    ) {}

    public function execute(): array
    {
        $users = $this->userRepository->findAll();

        return array_map(
            fn($u) => UserResponse::fromEntity($u),
            $users
        );
    }
}
