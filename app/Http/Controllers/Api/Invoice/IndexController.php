<?php

namespace App\Http\Controllers\Api\Invoice;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        Invoice::query()
        ->with([
            'user',
        ])
        ->where('user_id', $request->user()->id)
        ->paginate(25);
    }
}
