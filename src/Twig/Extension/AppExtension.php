<?php

namespace App\Twig\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('price', [$this, 'formatPrice']),
        ];
    }

    public function formatPrice(float $number, int $decimals = 0, string $decimalPoint = '.', string $thousandSeparator = ','): string
    {
        $price = number_format($number, $decimals, $decimalPoint, $thousandSeparator);

        return sprintf('$%s', $price);
    }
}
