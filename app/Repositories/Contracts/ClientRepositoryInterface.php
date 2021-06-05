<?php

namespace App\Repositories\Contracts;

interface ClientRepositoryInterface
{
    public function create(array $data);
    public function show(int $id);

}
