<?php

use App\CleanArch\UseCases\CustomerUseCase;
use App\CleanArch\UseCases\DTOs\CustomerInputDto;
use App\CleanArch\Infrastructure\Adapters\DomPdfAdapter;
use App\CleanArch\Infrastructure\Adapters\LocalStorageAdapter;
use App\CleanArch\Infrastructure\Adapters\Repositories\PdoRepository;

$pdfAdpter = new DomPdfAdapter();
$storageAdapter = new LocalStorageAdapter();

$repository = new PdoRepository();
$customerUseCase = new CustomerUseCase($repository, $pdfAdpter, $storageAdapter); 
$inputDto = new CustomerInputDto('bruce@warner-dc.com', 'CustomerUseCaseTest.pdf', __DIR__. '/../../tests/storage/customer');
$output = $customerUseCase->handle($inputDto); 

it("should returns string with the file path", fn() => expect($output->getFileName())->toBeString());
it("should exists the file in directory", fn() => expect($output->getFileName())->toBeReadableFile());