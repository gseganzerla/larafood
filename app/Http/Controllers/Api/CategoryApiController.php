<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Http\Resources\CategoryResource;

class CategoryApiController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService) 
    {
        $this->categoryService = $categoryService;
    }

    public function categoriesByTenant(TenantFormRequest $request) 
    {
        // if (!$request->token_company) {
        //     return response()->json(['message' => 'Token not Found'], 404);
        // }

        $categories = $this->categoryService->getCategoriesByUuid($request->token_company);

        return CategoryResource::collection($categories);
    }
}
