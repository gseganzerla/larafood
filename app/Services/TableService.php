<?php


namespace App\Services;

use App\Repositories\Contracts\TenantRepositoryInterface;
use App\Repositories\Contracts\TableRepositoryInterface;

class TableService
{
    protected $tableRepository, $tenantRepository;

    public function __construct(TableRepositoryInterface $tableRepository, TenantRepositoryInterface $tenantRepository)
    {
        $this->tableRepository = $tableRepository;
        $this->tenantRepository = $tenantRepository;
    }

    public function getTablesByUuid(string $uuid) 
    {
        $tenant = $this->tenantRepository->getTenantByUuid($uuid);

        return $this->tableRepository->getTablesByTenantId($tenant->id);
    }

    public function getTableByUrl(string $url) 
    {
        return $this->tableRepository->getTableByIdentify($url);
    }
}
