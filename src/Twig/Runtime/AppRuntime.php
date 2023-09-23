<?php

namespace App\Twig\Runtime;

use Twig\Extension\RuntimeExtensionInterface;

class AppRuntime implements RuntimeExtensionInterface
{
    public function __construct()
    {
    }

    public function ucfirst(string $text): string
    {
        return ucfirst($text);
    }
}
