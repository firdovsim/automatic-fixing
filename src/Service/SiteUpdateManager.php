<?php

namespace App\Service;

use App\Generator\MessageGenerator;

class SiteUpdateManager
{
    public function __construct(
        protected readonly MessageGenerator $messageGenerator,
        protected string $adminEmail,
        protected $hasher
    ) {
    }

    public function notifyEverybody(): void
    {
        dump('Again!');
        dump($this->hasher);
    }
}
