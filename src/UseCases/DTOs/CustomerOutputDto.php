<?php

namespace App\CleanArch\UseCases\DTOs;

final class CustomerOutputDto 
{
    public function __construct(
        private string $fileName
    ) {}

    public function getFileName(): string
    {
        return $this->fileName;
    }
}