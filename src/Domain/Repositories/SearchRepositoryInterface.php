<?php

namespace App\CleanArch\Domain\Repositories;

use App\CleanArch\Domain\Entities\Customer;

interface SearchRepositoryInterface
{
    public function findByEmail(string $email): Customer;
}