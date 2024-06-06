<?php

namespace App\Http\Resources\Invoice;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //Si une facture appartenait à plusieurs personnes, on aurait fait : UserResource::collection
        //Mais ici on sait qu'l y a une relation de BelongsTo entre Invoice et User donc on fait UserResource::make
        return [
            'id'=>$this->id,
            'total_price'=>$this->total_price . '$',
            'owner'=> UserResource::make($this->whenLoaded('user')),
        ];

        //WhenLoaded pour loader le User quand il est chargé et pas avant
    }
}
