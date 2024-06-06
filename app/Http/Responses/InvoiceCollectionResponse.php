<?php

namespace App\Http\Responses;

use App\Http\Resources\Invoice\InvoiceCollection;
use App\Models\Invoice;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class InvoiceCollectionResponse implements Responsable
{
    protected $data;

    public function __construct(
        private readonly Collection|LengthAwarePaginator $collection,
        private readonly int $status=200,
    )
    {

    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function toResponse($request)
    {
        return response()->json(
          data: InvoiceCollection::make(
            resource: $this->collection,
          )->response()->getData(),
          status:$this->status,
        );
    }
}
