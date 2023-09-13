<?php

namespace App\CleanArch\Infrastructure\Adapters;

use App\CleanArch\UseCases\Contracts\StorageContractInterface;

final class LocalStorageAdapter implements StorageContractInterface
{
    public function store(string $fileName, string $path, string $content)
    {
        file_put_contents($path . DIRECTORY_SEPARATOR . $fileName, $content);
    }
}

