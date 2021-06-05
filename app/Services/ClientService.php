<?php

namespace App\Services;

use App\Http\Requests\StoreClient;
use App\Repositories\Contracts\ClientRepositoryInterface;

class ClientService
{
    protected $clientRepository;

    public function __construct(ClientRepositoryInterface $clientRepository) 
    {
        $this->clientRepository = $clientRepository;
    }

    public function create(array $data) 
    {
        return $this->clientRepository->create($data);
    }
}