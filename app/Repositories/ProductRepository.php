<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Tenant\Scopes\TenantScope;

class ProductRepository  implements ProductRepositoryInterface
{

    protected $table, $entity;

    public function __construct(Product $product)
    {
        $this->table = 'products';
        $this->entity = $product;
    }

    public function getProductsByTenantId(int $idTenant, $categories)
    {
        return DB::table($this->table)
            ->join('category_product', 'category_product.product_id', '=', 'products.id')
            ->join('categories', 'category_product.category_id', '=', 'categories.id')
            ->where('products.tenant_id', $idTenant)
            ->where('categories.tenant_id', $idTenant)
            ->where(function ($query) use ($categories) {
                if ($categories != []) {
                    $query->whereIn('categories.uuid', $categories);
                }
            })
            ->select('products.*')
            ->get();
    }

    public function getProductByUuid(string $uuid)
    {
        return $this->entity
            ->withoutGlobalScope(TenantScope::class)
            ->where('uuid', $uuid)
            ->first();
    }
}
