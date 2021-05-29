<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\TenantService;
use App\Http\Controllers\Controller;
use App\Http\Resources\TenantResource;

class TenantApiController extends Controller
{
    public function __construct(TenantService $tenantService)
    {
        $this->tenantService = $tenantService;
    }

    public function index(Request $request)
    {
        $perPage = (int) $request->get('per_page', 15);
        
        $tenants = $this->tenantService->getAllTenants($perPage);

        return TenantResource::collection($tenants);
    }

    public function show($uuid)
    {
        $tenant = $this->tenantService->getTenantByUuid($uuid);

        if (!$tenant) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        return new TenantResource($tenant);
    }
}
