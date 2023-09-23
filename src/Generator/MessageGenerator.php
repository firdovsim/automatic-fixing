<?php

namespace App\Generator;

class MessageGenerator
{
    private string $contentsDir;

    public function __construct($contentsDir)
    {
        $this->contentsDir = $contentsDir;
    }

    public function getMessage(): string
    {
        return $this->contentsDir;
    }
}
