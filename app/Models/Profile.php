<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'description'];

    public function permissions() 
    {
        return $this->belongsToMany(Permission::class);
    }

    // Permission not linked with this profile
    public function permissionsAvaliable() 
    {   
        $this->id;

        $permissions = Permission::whereNotIn('id', function($query){
            $query->select('permission_profile.permission_id');
            $query->from('permission_profile');
            $query->whereRaw("permission_profile.profile_id={$this->id}");
        })
        ->paginate();

        return $permissions;
    }
}
