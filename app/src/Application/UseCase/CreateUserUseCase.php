<?php

namespace App\Application\UseCase;

use App\Application\DTO\CreateUserRequest;
use App\Application\DTO\UserResponse;
use App\Domain\Entity\User;
use App\Domain\Repository\UserRepositoryInterface;

class CreateUserUseCase
{
    public function __construct(
        private UserRepositoryInterface $repository
    ) {}

    public function execute(CreateUserRequest $request): UserResponse
    {
        $user = new User($request->name, $request->email);

        $this->repository->save($user);

        return UserResponse::fromEntity($user);
    }
}
