<?php


use App\CleanArch\UseCases\CustomerUseCase;
use App\CleanArch\UseCases\DTOs\CustomerInputDto;
use App\CleanArch\Infrastructure\Adapters\DomPdfAdapter;
use App\CleanArch\Infrastructure\Adapters\Cli\CustomerCommand;
use App\CleanArch\Infrastructure\Adapters\LocalStorageAdapter;
use App\CleanArch\Infrastructure\Adapters\Repositories\PdoRepository;
use App\CleanArch\Infrastructure\Adapters\Presenters\CustomerPresenter;

$customerRepository = new PdoRepository();
$pdfAdapter = new DomPdfAdapter();
$storageAdapter = new LocalStorageAdapter();

$customerUseCase = new CustomerUseCase($customerRepository, $pdfAdapter, $storageAdapter); 
$inputDto = new CustomerInputDto('bruce@warner-dc.com', 'CustomerCommandTest.pdf', __DIR__. '/../../../../tests/storage/customer');
$customerCommand = new CustomerCommand($customerUseCase);
$customerPresenter = new CustomerPresenter();

$response = $customerCommand->handle($inputDto, $customerPresenter);

it("should returns a string", fn() => expect($response)->toBeString());
it("should exists the file in directory", fn() => expect(json_decode($response)->filename)->toBeReadableFile());
