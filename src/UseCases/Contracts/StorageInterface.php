<?php

namespace App\CleanArch\UseCases\Contracts;

interface StorageInterface
{
    public function store(string $fileName, string $path, string $content);
}

