<?php

namespace App\CleanArch\Infrastructure\Adapters;

use App\CleanArch\UseCases\Contracts\PdfInterface;
use Dompdf\Dompdf;

final class DomPdfAdapter implements PdfInterface
{
    public function generate(string $content): string
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml("<p>Nome: {$customer->getName()}</p>");
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();        

        return $dompdf->output();
    }
}

