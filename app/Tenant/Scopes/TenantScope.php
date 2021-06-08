<?php

namespace App\Tenant\Scopes;

use App\Tenant\ManagerTenant;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class TenantScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {

        $identify = $managerTenant = app(ManagerTenant::class);

        if ($identify) {
            $builder->where('tenant_id', $identify );
        }
    }
}
