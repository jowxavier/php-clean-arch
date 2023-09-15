<?php

namespace App\CleanArch\Infrastructure\Adapters\Controllers;

interface PresenterInterface
{
    public function output(array $data): string;
}