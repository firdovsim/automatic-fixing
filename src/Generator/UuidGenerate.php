<?php

namespace App\Generator;

class UuidGenerate
{
    /**
     * @throws \Exception
     */
    public function generate(): int
    {
        return random_int(0, 100);
    }
}
