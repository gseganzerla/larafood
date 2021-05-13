<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // usada para automatizat as chaves estrangeiras, trazendo seg e facilidade
    use TenantTrait;

    protected $fillable = ['name', 'url', 'description'];
    
    public function products() 
    {
        return $this->belongsToMany(Product::class);
    }
}
