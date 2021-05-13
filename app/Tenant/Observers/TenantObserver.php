<?php

namespace App\Tenant\Observers;

use App\Tenant\ManagerTenant;
use Illuminate\Database\Eloquent\Model;

class TenantObserver
{
    // Observer criado separadamente pois servira para mais de um proposito
    // Cadastar tenant_id em  Category ou User

    public function creating(Model $model)
    {

        $managerTenant = app(ManagerTenant::class);

        $model->tenant_id = $managerTenant->getTenantIdentify();
    }
}
