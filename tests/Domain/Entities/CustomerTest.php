<?php

use DateTimeImmutable as Date;
use App\CleanArch\Domain\Entities\Customer;
use App\CleanArch\Domain\ValueObjects\Email;

$customer = (new Customer())
                ->setName('Jonathan Xavier Ribeiro')
                ->setEmail(new Email('jonathanxribeiro@gmail.com'))
                ->setBirthDate(new Date('1987-03-27'));

it('should returns object', fn() => expect($customer)->toBeObject());

