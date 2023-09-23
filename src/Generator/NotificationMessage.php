<?php

namespace App\Generator;

use Symfony\Component\DependencyInjection\Attribute\When;

#[When(env: 'dev')]
class NotificationMessage
{
    private $email;

    public function __construct($email, $generator)
    {
        $this->email = $email;
        $generator();
    }

    public function sendMessage(): void
    {
        dump('Message was sent to '.$this->email);
        exit;
    }
}
