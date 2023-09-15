<?php

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use App\CleanArch\UseCases\CustomerUseCase;
use App\CleanArch\UseCases\DTOs\CustomerInputDto;
use App\CleanArch\Infrastructure\Adapters\DomPdfAdapter;
use App\CleanArch\Infrastructure\Adapters\LocalStorageAdapter;
use App\CleanArch\Infrastructure\Adapters\Repositories\PdoRepository;
use App\CleanArch\Infrastructure\Adapters\Presenters\CustomerPresenter;
use App\CleanArch\Infrastructure\Adapters\Controllers\CustomerController;

$customerRepository = new PdoRepository();
$pdfAdapter = new DomPdfAdapter();
$storageAdapter = new LocalStorageAdapter();

$customerUseCase = new CustomerUseCase($customerRepository, $pdfAdapter, $storageAdapter); 
$request = new Request('GET', 'http://localhost');
$response = new Response();

$customerController = new CustomerController(
    $request,
    $response,
    $customerUseCase
);

$inputDto = new CustomerInputDto('bruce@warner-dc.com', 'CustomerControllerTest.pdf', __DIR__. '/../../../../tests/storage/customer');
$customerPresenter = new CustomerPresenter();

$response = $customerController
    ->handle($inputDto, $customerPresenter)
    ->getBody();

it("should returns a object", fn() => expect($response)->toBeObject());
it("should exists the file in directory", fn() => expect(json_decode($response)->fileName)->toBeReadableFile());
