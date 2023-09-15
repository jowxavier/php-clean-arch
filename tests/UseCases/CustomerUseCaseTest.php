<?php

use App\CleanArch\UseCases\CustomerUseCase;
use App\CleanArch\UseCases\DTOs\CustomerInputDto;
use App\CleanArch\Infrastructure\Adapters\DomPdfAdapter;
use App\CleanArch\Infrastructure\Adapters\LocalStorageAdapter;
use App\CleanArch\Infrastructure\Adapters\Repositories\PdoRepository;

beforeEach(function () {
    $this->repository = new PdoRepository();
});

it('should returns string with the file path', function () {
    $pdfAdpter = new DomPdfAdapter();
    $storageAdapter = new LocalStorageAdapter();
 
    $customerUseCase = new CustomerUseCase($this->repository, $pdfAdpter, $storageAdapter); 
    $inputDto = new CustomerInputDto('bruce@warner-dc.com', 'test.pdf', __DIR__. '/../../storage/customer');
    $output = $customerUseCase->handle($inputDto);    

    expect($output->getFileName())->toBeString();
});