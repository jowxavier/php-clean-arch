<?php

use App\CleanArch\Domain\ValueObjects\Email;
use App\CleanArch\Domain\Exceptions\CustomerNotFoundException;

$email = 'jonathanxribeiro@gmail.com';
it('should returns email not found', function () use ($email) {
    throw new CustomerNotFoundException(
        new Email($email)
    );
})->throws(CustomerNotFoundException::class, "Email '{$email}' not found");