<?php

namespace App\Application\UseCase;

use App\Application\DTO\UserResponse;
use App\Domain\Repository\UserRepositoryInterface;

class ListUsersUseCase
{
    public function __construct(
        private UserRepositoryInterface $repository
    ) {}

    public function execute(): array
    {
        return array_map(
            fn($user) => UserResponse::fromEntity($user),
            $this->repository->findAll()
        );
    }
}
