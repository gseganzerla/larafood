<?php

namespace App\Tenant;

use App\Models\Tenant;

class ManagerTenant
{
    // por que acessar o banco de dados para pegar o logado
    // sendo que ja tem isso nas sessions, por isso que foi feito essa classe

    public function getTenantIdentify()
    {
        return auth()->check() ? auth()->user()->tenant_id: '';
    }

    public function getTenant()
    {
        return auth()->check() ? auth()->user()->tenant : '';
    }

    public function isAdmin(): bool
    {
        return in_array(auth()->user()->email, config('tenant.admins'));
    }
}
