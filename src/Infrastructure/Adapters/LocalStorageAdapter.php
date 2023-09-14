<?php

namespace App\CleanArch\Infrastructure\Adapters;

use App\CleanArch\UseCases\Contracts\StorageInterface;

final class LocalStorageAdapter implements StorageInterface
{
    public function store(string $fileName, string $path, string $content)
    {
        file_put_contents($path . DIRECTORY_SEPARATOR . $fileName, $content);
    }
}

