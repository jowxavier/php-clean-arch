<?php

use App\CleanArch\UseCases\CustomerUseCase;
use App\CleanArch\UseCases\DTOs\CustomerInputDto;
use App\CleanArch\Infrastructure\Adapters\DomPdfAdapter;
use App\CleanArch\Infrastructure\Adapters\LocalStorageAdapter;
use App\CleanArch\Infrastructure\Adapters\Repositories\PdoRepository;

beforeEach(function () {
    $appConfig = require_once __DIR__ . '/../../../config/database.php';

    $dsn = sprintf(
        'mysql:host=%s;port=%s;dbname=%s;charset=%s',
        $appConfig['db']['host'],
        $appConfig['db']['port'],
        $appConfig['db']['dbname'],
        $appConfig['db']['charset']
    );

    $pdo = new PDO($dsn, $appConfig['db']['username'], $appConfig['db']['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_PERSISTENT => TRUE
    ]);

    $this->repository = new PdoRepository($pdo);
});

it('should returns string with the file path', function () {
    $pdf = new DomPdfAdapter();
    $storage = new LocalStorageAdapter();
 
    $customerUseCase = new CustomerUseCase($this->repository, $pdf, $storage); 
    $inputDto = new CustomerInputDto('bruce@warner-dc.com', 'test.pdf', __DIR__. '/../../../storage/customer');
    $output = $customerUseCase->handle($inputDto);    

    expect($output->getFileName())->toBeString();
});