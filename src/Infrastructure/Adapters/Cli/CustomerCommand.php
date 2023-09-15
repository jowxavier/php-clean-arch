<?php

namespace App\CleanArch\Infrastructure\Adapters\Cli;

use App\CleanArch\UseCases\CustomerUseCase;
use App\CleanArch\UseCases\DTOs\CustomerInputDto;
use App\CleanArch\Infrastructure\Adapters\Controllers\PresenterInterface;

final class CustomerCommand
{
    public function __construct(
        private CustomerUseCase $useCase
    ) {}

    public function handle(CustomerInputDto $inputDto, PresenterInterface $presenter): string
    {
        $output = $this->useCase->handle($inputDto);

        return $presenter->output([
            'filename' => $output->getFileName()
        ]);
    }
}