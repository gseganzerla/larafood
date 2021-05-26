<?php


namespace App\Models\Traits;

use App\Models\Tenant;

trait UserACLTrait
{
    private $permissions;

    public function permissions()
    {

        $permissionsPlan = $this->permissionsPlan();
        $permissionsRole = $this->permissionsRole();

        foreach ($permissionsRole as $permissionRole) {
            if (in_array($permissionRole, $permissionsPlan)) {
                array_push($permissions, $permissionsPlan);
            }
        }

        return $permissions;
    } 

    public function permissionsRole()
    {
        $roles = $this->roles()->with('permissions')->get();

        foreach ($roles->permissions as $permission) {
            array_push($permissions, $permission->name);
        }

        return $permissions;
    }

    public function permissionsPlan()
    {
        $tenant = Tenant::with('plan.profiles.permissions')->where('id', $this->tanant_id)->first();
        $plan = $tenant->plan;

        foreach ($plan->profiles as $profile) {
            foreach ($profile->permissions as $permission) {
                array_push($permissions, $permission->name);
            }
        }

        return $permissions;
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
