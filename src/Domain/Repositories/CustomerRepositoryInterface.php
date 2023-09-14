<?php

namespace App\CleanArch\Domain\Repositories;

use App\CleanArch\Domain\Entities\Customer;
use App\CleanArch\Domain\ValueObjects\Email;

interface CustomerRepositoryInterface
{
    public function findByEmail(Email $email): Customer;
}