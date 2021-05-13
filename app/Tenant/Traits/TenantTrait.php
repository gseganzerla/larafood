<?php


namespace App\Tenant\Traits;

use App\Tenant\Observers\TenantObserver;

trait TenantTrait
{
    public static function booted()
    {
        parent::booted();

        static::observe(TenantObserver::class);
    }
}
