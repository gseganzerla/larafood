<?php

namespace App\Repositories;

use App\Models\Table;
use Illuminate\Support\Facades\DB;
use App\Repositories\Contracts\TableRepositoryInterface;
use App\Tenant\Scopes\TenantScope;

class TableRepository  implements TableRepositoryInterface
{

    protected $table, $entity;

    public function __construct(Table $table)
    {
        $this->table = 'tables';
        $this->entity = $table;
    }

    public function getTablesByTenantUuid(string $uuid)
    {
        return DB::table($this->table)
            ->join('tenants', 'tenants.id', '=', 'tables.tenant_id')
            ->where('tenants.uuid', $uuid)
            ->select('tables.*')
            ->get();
    }


    public function getTablesByTenantId(int $idTenant)
    {
        return DB::table($this->table)->where('tenant_id', $idTenant)->get();
    }

    public function getTableByUuid(string $uuid)
    {
        return $this->entity
            ->withoutGlobalScope(TenantScope::class)
            ->where('uuid', $uuid)
            ->first();
    }
}
