<?php

namespace App\CleanArch\UseCases\Contracts;

use App\CleanArch\Domain\Entities\Customer;

interface CustomerPdfContractInterface
{
    public function generate(Customer $customer): string;
}
