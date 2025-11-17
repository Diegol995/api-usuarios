<?php

namespace App\Infrastructure\Controller;

use App\Application\UseCase\CreateUser;
use App\Domain\Repository\UserRepositoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/users')]
class UserController
{
    public function __construct(
        private CreateUser $createUser,
        private UserRepositoryInterface $userRepository
    ) {}

    #[Route('', name: 'user_create', methods: ['POST'])]
    public function create(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $user = $this->createUser->execute($data['name'], $data['email']);

        return new JsonResponse([
            'id' => $user->getId(),
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'created_at' => $user->getCreatedAt()->format('Y-m-d H:i:s'),
        ], 201);
    }

    #[Route('', name: 'user_list', methods: ['GET'])]
    public function list(): JsonResponse
    {
        $users = $this->userRepository->findAll();

        $data = array_map(fn($u) => [
            'id' => $u->getId(),
            'name' => $u->getName(),
            'email' => $u->getEmail(),
        ], $users);

        return new JsonResponse($data);
    }
}
