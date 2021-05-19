<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryProductController extends Controller
{
    protected $product, $category;

    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;

        $this->middleware('can:products');

    }

    public function categories($idProduct)
    {
        $product = $this->product->find($idProduct);

        if (!$product) {
            return redirect()->back();
        }

        $categories = $product->categories()->paginate();

        return view('admin.pages.products.categories.categories', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function categoriesAvailable(Request $request, $idProduct)
    {
        $product = $this->product->find($idProduct);

        if (!$product) {
            return redirect()->back();
        }

        $filter = $request->except('_token');

        $categories = $product->categoriesAvailable($request->filter);

        return view('admin.pages.products.categories.available', [
            'product' => $product,
            'categories' => $categories,
            'filters' => $filter
        ]);
    }

    public function attachCategoriesProduct(Request $request, $idProduct)
    {
        $product = $this->product->find($idProduct);

        if (!$product) {
            return redirect()->back();
        }

        if (!$request->categories || count($request->categories) == 0) {
            return redirect()->back()->with('info', 'Precisa escolher pelo menos uma permissão');
        }

        $product->categories()->attach($request->categories);

        return redirect()->route('products.categories', $product->id);
    }

    public function detachCategoryProduct($idProduct, $idCategory) 
    {
        $product = $this->product->find($idProduct);
        $category = $this->category->find($idCategory);

        if (!$product || !$category) {
            return redirect()->back();
        }

        $product->categories()->detach($category);

        return redirect()->route('products.categories', $product->id);

    }

    public function products($idCategory) 
    {
        
        $category = $this->category->find($idCategory);

        if (!$category) {
            return redirect()->back();
        }

        $products = $category->products()->paginate();
        // dd($products);
        return view('admin.pages.categories.products.products', [
            'products' => $products,
            'category' => $category
        ]);
    }
}
