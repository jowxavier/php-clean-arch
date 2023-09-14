<?php

namespace App\CleanArch\Domain\Exceptions;

use Exception;
use Throwable;
use App\CleanArch\Domain\ValueObjects\Email;

class CustomerNotFoundException extends Exception
{
    public function __construct(Email $email, $code = 0, Throwable $previous = null)
    {
        $message = "Email '{$email}' not found";
        parent::__construct($message, $code, $previous);
    }
}