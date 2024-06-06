<?php

namespace App\Http\Controllers\Api\Invoice;

use App\DataTransferObjects\Invoice\InvoiceDataObject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
       $invoiceDto =  new InvoiceDataObject(
            totalVat : $request->total_vat,
            totalPriceExcludingVat:  $request->totalPriceExcludingVat,
       );

      // ['1.20','100']->1.20, 100
       (new StoreInvoiceAction)
       ->handle(
        Str::uuid(),
        $requet->user()->id,
            ...$invoiceDto->toArray(),
       );
    }
}
