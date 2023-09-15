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

require_once __DIR__ . '/../vendor/autoload.php';

$customerRepository = new PdoRepository();
$pdfAdapter = new DomPdfAdapter();
$storageAdapter = new LocalStorageAdapter();

$customerUseCase = new CustomerUseCase($customerRepository, $pdfAdapter, $storageAdapter); 
$inputDto = new CustomerInputDto('bruce@warner-dc.com', 'test.pdf', __DIR__. '/../storage/customer');
$output = $customerUseCase->handle($inputDto);

$request = new Request('GET', 'http://localhost');
$response = new Response();

$customerController = new CustomerController(
    $request,
    $response,
    $customerUseCase
);

$customerPresenter = new CustomerPresenter();

echo $customerController
    ->handle($inputDto, $customerPresenter)
    ->getBody();

