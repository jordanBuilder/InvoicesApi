<?php

namespace App\Http\Controllers\Api\Invoice;

use App\Http\Controllers\Controller;
use App\Http\Resources\Invoice\InvoiceCollection;
use App\Http\Responses\InvoiceCollectionResponse;
use App\Models\Invoice;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request):  InvoiceCollectionResponse
    {
        //
        return new InvoiceCollectionResponse(
            collection: Invoice::query()
            ->with([
                'user'
            ])
            ->where('user_id', $request->user()->id)
            ->paginate(25),
            );

            return new InvoiceCollectionResponse(
                collection: Invoice::query()
                ->with([
                    'user'
                ])
                ->where('user_id',$request->user()->id)
                ->paginate(25),
                );
}

}
