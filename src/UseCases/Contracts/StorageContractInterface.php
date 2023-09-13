<?php

namespace App\CleanArch\UseCases\Contracts;

interface StorageContractInterface
{
    public function store(string $fileName, string $path, string $content);
}

