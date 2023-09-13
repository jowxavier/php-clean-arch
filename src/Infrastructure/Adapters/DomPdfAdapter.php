<?php

namespace App\CleanArch\Infrastructure\Adapters;

use App\CleanArch\Domain\Entities\Customer;
use App\CleanArch\UseCases\Contracts\CustomerPdfContractInterface;
use Dompdf\Dompdf;

final class DomPdfAdapter implements CustomerPdfContractInterface
{
    public function generate(Customer $customer): string
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml("<p>Nome: {$customer->getName()}</p>");
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();        

        return $dompdf->output();
    }
}

