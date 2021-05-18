<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use TenantTrait;

    protected $fillable = ['title', 'flag', 'price', 'description', 'image'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    // Category not linked with this profile
    public function categoriesAvailable($filter = null)
    {
        $this->id;

        $categories = Category::whereNotIn('categories.id', function ($query) {
            $query->select('category_product.category_id');
            $query->from('category_product');
            $query->whereRaw("category_product.product_id={$this->id}");
        })
            ->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->where('categories.name', 'LIKE', "%{$filter}%");
                }
            })
            ->paginate();

        return $categories;
    }
}
