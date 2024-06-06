<?php

namespace App\Http\Responses;

use App\Http\Resources\Invoice\InvoiceCollection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\JsonResponse as HttpFoundationJsonResponse;

class InvoiceCollectionResponse implements Responsable
{

    public function __construct(
        private readonly Collection|LengthAwarePaginator $collection,
        private readonly int $status = 200,
    )
    {

    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function toResponse($request):JsonResponse
    {
        return response()->json(
            data: new InvoiceCollection(
                resource: $this->collection,
            ),
            status: $this->status,
        );

    }

  
}
