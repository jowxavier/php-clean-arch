<?php

namespace App\CleanArch\UseCases;

use App\CleanArch\UseCases\DTOs\CustomerInputDto;
use App\CleanArch\UseCases\DTOs\CustomerOutputDto;
use App\CleanArch\UseCases\Contracts\StorageInterface;
use App\CleanArch\Domain\Repositories\CustomerRepositoryInterface;
use App\CleanArch\Domain\ValueObjects\Email;
use App\CleanArch\UseCases\Contracts\PdfInterface;

class CustomerUseCase
{
    public function __construct(
        private CustomerRepositoryInterface $repository,
        private PdfInterface $pdf,
        private StorageInterface $storage
    ) {}

    public function handle(CustomerInputDto $inputDto): CustomerOutputDto
    {   
        $customer = $this->repository->findByEmail(new Email($inputDto->getEmail()));
        $html = "<p>Nome: {$customer->getName()}</p>";
        $content = $this->pdf->generate($html);
        $this->storage->store($inputDto->getPdFileName(), $inputDto->getPath(), $content);

        return new CustomerOutputDto(
            $inputDto->getPath() . DIRECTORY_SEPARATOR . $inputDto->getPdFileName()
        );
    }
}

