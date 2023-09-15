<?php

namespace App\CleanArch\Infrastructure\Adapters\Repositories;

use PDO;
use DateTimeImmutable;
use App\CleanArch\Domain\Entities\Customer;
use App\CleanArch\Domain\ValueObjects\Email;
use App\CleanArch\Infrastructure\Database\PdoConnection;
use App\CleanArch\Domain\Exceptions\CustomerNotFoundException;
use App\CleanArch\Domain\Repositories\CustomerRepositoryInterface;

final class PdoRepository extends PdoConnection implements CustomerRepositoryInterface
{
    public function findByEmail(Email $email): Customer
    {
        $query = $this->pdo->prepare(
            "SELECT * FROM `customers` WHERE email = :email"
        );

        $query->execute([':email' => (string)$email]);
        $record = $query->fetch(PDO::FETCH_OBJ);

        if (!$record) {
            throw new CustomerNotFoundException($email);
        }

        $customer = new Customer();
        $customer->setName($record->name)
            ->setBirthDate(new DateTimeImmutable($record->birth_date))
            ->setEmail(new Email($record->email));

        return $customer;
    }
}

