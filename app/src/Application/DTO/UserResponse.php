<?php

namespace App\Application\DTO;

use App\Domain\Entity\User;

class UserResponse
{
    public int $id;
    public string $name;
    public string $email;
    public string $createdAt;

    public static function fromEntity(User $user): self
    {
        $dto = new self();
        $dto->id = $user->getId();
        $dto->name = $user->getName();
        $dto->email = $user->getEmail();
        $dto->createdAt = $user->getCreatedAt()->format('c');

        return $dto;
    }
}
