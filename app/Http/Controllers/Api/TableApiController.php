<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\TableService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Http\Resources\TableResource;

class TableApiController extends Controller
{
    protected $tableService;

    public function __construct(TableService $tableService) 
    {
        $this->tableService = $tableService;
    }

    public function tablesByTenant(TenantFormRequest $request) 
    {
        // if (!$request->token_company) {
        //     return response()->json(['message' => 'Token not Found'], 404);
        // }

        $tables = $this->tableService->getTablesByUuid($request->token_company);

        return TableResource::collection($tables);
    }

    public function show(TenantFormRequest $request, $uuid) 
    {
        $table = $this->tableService->getTableByUuid($uuid);

        return new TableResource($table);
    }
}
