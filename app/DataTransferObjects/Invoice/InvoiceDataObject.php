<?php

declare(stricts_types=1);

namespace App\DataTransferObjects\Invoice;

class InvoiceDataObject
{
    public function __construct(
        private readonly string $totalVat,
        private readonly string $totalPriceExcludingVat,
    ) {
    }

    public function toArray(): Array{
        return[
            'totalVat'=>$this->totalVat,
            'totalPriceExcludingVat'=>$this->totalPriceExcludingVat,
        ];
    }
}
