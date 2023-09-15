<?php

use App\CleanArch\UseCases\CustomerUseCase;
use App\CleanArch\UseCases\DTOs\CustomerInputDto;
use App\CleanArch\Infrastructure\Adapters\DomPdfAdapter;
use App\CleanArch\Infrastructure\Adapters\LocalStorageAdapter;
use App\CleanArch\Infrastructure\Adapters\Repositories\PdoRepository;

require_once __DIR__ . '/../vendor/autoload.php';

$customerRepository = new PdoRepository();
$pdfAdapter = new DomPdfAdapter();
$storageAdapter = new LocalStorageAdapter();

$customerUseCase = new CustomerUseCase($customerRepository, $pdfAdapter, $storageAdapter); 
$inputDto = new CustomerInputDto('bruce@warner-dc.com', 'test.pdf', __DIR__. '/../storage/customer');
$output = $customerUseCase->handle($inputDto);

echo $output->getFileName();

