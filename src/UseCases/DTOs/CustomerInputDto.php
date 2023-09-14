<?php

namespace App\CleanArch\UseCases\DTOs;

class CustomerInputDto
{
    public function __construct(
        private string $email,
        private string $pdFileName,
        private string $path
    ) {}

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPdFileName(): string
    {
        return $this->pdFileName;
    }

    public function getPath()
    {
        return $this->path;
    }
}
