<?php

namespace App\CleanArch\Domain\Entities;

use DateTimeInterface;
use App\CleanArch\Domain\ValueObjects\Email;

class Customer
{
    private string $name;
    private Email $email; 
    private DateTimeInterface $birthDate;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): Customer
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function setEmail($email): Customer
    {
        $this->email = $email;

        return $this;
    }

    public function getBirthDate(): DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate($birthDate): Customer
    {
        $this->birthDate = $birthDate;

        return $this;
    }
}

