<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreClient;
use App\Http\Resources\ClientResource;
use App\Services\ClientService;

class RegisterController extends Controller
{
    public function __construct(ClientService $clientService) 
    {
        $this->clientService = $clientService;
    }

    public function store(StoreClient $request) 
    {
        $client = $this->clientService->create($request->all());

        return new ClientResource($client);
    }
}
