<?php

namespace App\Infrastructure\Doctrine;

use App\Domain\Entity\User;
use App\Domain\Repository\UserRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(private EntityManagerInterface $em)
    {
    }

    public function save(User $user): void
    {
        $this->em->persist($user);
        $this->em->flush();
    }

    public function findAll(): array
    {
        return $this->em->getRepository(User::class)->findAll();
    }

    public function findById(int $id): ?User
    {
        return $this->em->getRepository(User::class)->find($id);
    }

    public function delete(User $user): void
    {
        $this->em->remove($user);
        $this->em->flush();
    }
}
