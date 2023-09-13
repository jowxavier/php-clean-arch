<?php

namespace App\CleanArch\UseCases;

use App\CleanArch\Domain\Repositories\SearchRepositoryInterface;
use App\CleanArch\UseCases\Contracts\StorageContractInterface;
use App\CleanArch\UseCases\Contracts\CustomerPdfContractInterface;
use App\CleanArch\UseCases\DTOs\CustomerInputDto;
use App\CleanArch\UseCases\DTOs\CustomerOutputDto;

class CustomerUseCase
{
    public function __construct(
        private SearchRepositoryInterface $repository,
        private CustomerPdfContractInterface $pdf,
        private StorageContractInterface $storage
    ) {}

    public function handle(CustomerInputDto $inputDto): CustomerOutputDto
    {
        $customer = $this->repository->findByEmail($inputDto->getEmail());
        $content = $this->pdf->generate($customer);
        $this->storage->store($inputDto->getPdFileName(), $inputDto->getPath(), $content);

        return new CustomerOutputDto(
            $inputDto->getPath() . DIRECTORY_SEPARATOR . $inputDto->getPdFileName()
        );
    }
}

