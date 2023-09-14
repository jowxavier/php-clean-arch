<?php

namespace App\CleanArch\UseCases\Contracts;

interface PdfInterface
{
    public function generate(string $content): string;
}
