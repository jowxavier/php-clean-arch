<?php

use App\CleanArch\Domain\Entities\Customer;
use App\CleanArch\Domain\ValueObjects\Email;
use App\CleanArch\Infrastructure\Adapters\DomPdfAdapter;
use App\CleanArch\Infrastructure\Adapters\LocalStorageAdapter;
use App\CleanArch\UseCases\CustomerUseCase;

require_once __DIR__ . '/../vendor/autoload.php';

$customer = (new Customer())
                ->setName('Jonathan Xavier Ribeiro')
                ->setEmail(new Email('jonathanxribeiro@gmail.com'))
                ->setBirthDate(new DateTimeImmutable('1987-03-27'));


$findRepository = new stdClass();
$pdf = new DomPdfAdapter();
$storage = new LocalStorageAdapter();

//$useCase = new CustomerUseCase($findRepository, $pdf, $storage); 

$html = "<p>Nome: {$customer->getName()}</p>";

$content = $pdf->generate($html);
$storage->store('test.pdf', __DIR__. '/../storage/customer', $content);exit();

