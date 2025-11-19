<?php

namespace App\Infrastructure\Controller;

use App\Application\DTO\CreateUserRequest;
use App\Application\UseCase\CreateUserUseCase;
use App\Application\UseCase\ListUsersUseCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController
{
    #[Route('/users', methods: ['GET'])]
    public function list(ListUsersUseCase $useCase): JsonResponse
    {
        return new JsonResponse($useCase->execute());
    }

    #[Route('/users', methods: ['POST'])]
    public function create(Request $request, CreateUserUseCase $useCase): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $dto = new CreateUserRequest(
            $data['name'],
            $data['email']
        );

        $response = $useCase->execute($dto);

        return new JsonResponse($response, 201);
    }
}
