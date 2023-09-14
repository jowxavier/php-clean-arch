<?php

namespace App\CleanArch\UseCases;

use App\CleanArch\UseCases\DTOs\CustomerInputDto;
use App\CleanArch\UseCases\DTOs\CustomerOutputDto;
use App\CleanArch\UseCases\Contracts\StorageContractInterface;
use App\CleanArch\Domain\Repositories\SearchRepositoryInterface;
use App\CleanArch\UseCases\Contracts\PdfInterface;

class CustomerUseCase
{
    public function __construct(
        private SearchRepositoryInterface $repository,
        private PdfInterface $pdf,
        private StorageContractInterface $storage
    ) {}

    public function handle(CustomerInputDto $inputDto): CustomerOutputDto
    {
        $customer = $this->repository->findByEmail($inputDto->getEmail());
        $html = "<p>Nome: {$customer->getName()}</p>";
        $content = $this->pdf->generate($html);
        $this->storage->store($inputDto->getPdFileName(), $inputDto->getPath(), $content);

        return new CustomerOutputDto(
            $inputDto->getPath() . DIRECTORY_SEPARATOR . $inputDto->getPdFileName()
        );
    }
}

