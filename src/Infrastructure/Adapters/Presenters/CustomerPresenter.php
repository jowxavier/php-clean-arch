<?php

namespace App\CleanArch\Infrastructure\Adapters\Presenters;

use App\CleanArch\Infrastructure\Adapters\Controllers\PresenterInterface;

final class CustomerPresenter implements PresenterInterface
{
    public function output(array $data): string
    {
        return json_encode($data);
    }
}