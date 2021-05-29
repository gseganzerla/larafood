<?php

namespace App\Repositories;

use App\Models\Tenant;
use App\Repositories\Contracts\TenantRepositoryInterface;

class TenantRepository implements TenantRepositoryInterface
{
    public function __construct(Tenant $tenant) 
    {
        $this->entity = $tenant;
    }

    public function getAllTenants(int $perPage) 
    {
        return $this->entity->paginate($perPage);
    }

    public function getTenantByUuid(string $uuid) 
    {
        return $this->entity->where('uuid', $uuid)->first();
    }
}
