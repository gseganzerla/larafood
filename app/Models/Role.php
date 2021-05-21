<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'description'];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function permissionsAvailable($filter = null)
    {
        $this->id;

        $permissions = Permission::whereNotIn('permissions.id', function ($query) {
            $query->select('permission_role.permission_id');
            $query->from('permission_role');
            $query->whereRaw("permission_role.role_id={$this->id}");
        })
            ->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->where('permissions.name', 'LIKE', "%{$filter}%");
                }
            })
            ->paginate();

        return $permissions;
    }
}
