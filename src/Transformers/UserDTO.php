<?php

namespace App\Transformers;

use Symfony\Component\Validator\Constraints\NotBlank;

class UserDTO
{
    public function __construct(
        #[NotBlank]
        public string $firstName,
        #[NotBlank]
        public string $lastName,
        #[NotBlank]
        public int $age
    ) {
    }
}
