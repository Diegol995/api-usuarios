<?php

namespace App\Application\DTO;

use App\Domain\Entity\User;

class UserResponse
{
    public function __construct(
        public int $id,
        public string $name,
        public string $email,
        public string $createdAt
    ) {}

    public static function fromEntity(User $user): self
    {
        return new self(
            $user->getId(),
            $user->getName(),
            $user->getEmail(),
            $user->getCreatedAt()->format('c')
        );
    }
}
