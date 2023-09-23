<?php

namespace App\Twig\Extension;

use App\Twig\Runtime\AppRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class TitleCaseExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('ucfirst', [AppRuntime::class, 'ucfirst']),
        ];
    }
}
