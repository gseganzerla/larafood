<?php


namespace App\Models\Traits;

use App\Models\Tenant;

trait UserACLTrait
{
    private $permissions = [];

    public function permissions()
    {

        $permissionsPlan = $this->permissionsPlan();
        $permissionsRole = $this->permissionsRole();

        foreach ($permissionsRole as $permission) {
            if (in_array($permission, $permissionsPlan )) {
                array_push($this->permissions, $permission);
            }
        }

        return $this->permissions;
    }

    public function permissionsRole()
    {
        $roles = $this->roles()->with('permissions')->get();

        foreach ($roles as $role) {
            foreach ($role->permissions as $permission) {
                array_push($this->permissions, $permission->name);
            }
        }

        return $this->permissions;
    }

    public function permissionsPlan(): array
    {

        $tenant = Tenant::with('plan.profiles.permissions')->where('id', $this->tenant_id)->first();
        $plan = $tenant->plan;

        foreach ($plan->profiles as $profile) {
            foreach ($profile->permissions as $permission) {
                array_push($this->permissions, $permission->name);
            }
        }

        return $this->permissions;
    }

    public function hasPermission(string $permissionName): bool
    {
        return in_array($permissionName, $this->permissions());
    }

    public function isAdmin(): bool
    {
        return in_array($this->email, config('acl.admins'));
    }

    public function isTenant(): bool
    {
        return !in_array($this->email, config('acl.admins'));
    }
}
