<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Support\Facades\DB;

class OrderRepository implements OrderRepositoryInterface
{
    protected $order;

    public function __construct(Order $order)
    {
        $this->entity = $order;
    }

    public function createNewOrder(
        string $identify,
        float $total,
        string $status,
        int $tenantId,
        string $comment,
        $clientId = '',
        $tableId = ''
    ) {

        $data = [
            'identify' => $identify,
            'total' => $total,
            'status' => $status,
            'tenant_id' => $tenantId,
            'comment' => $comment
        ];

        if ($clientId) $data['client_id'] = $clientId;
        if ($tableId) $data['table_id'] = $tableId;

        $order = $this->entity->create($data);

        return $order;
    }
    public function getOrderByIdentify(string $identify)
    {
        return $this->entity
            ->where('identify', $identify)
            ->first();
    }

    public function registerProductsOrder(int $orderId, array $products)
    {
        $orderProducts = [];

        $order = $this->entity->find($orderId);

        $orderProducts = [];

        foreach ($products as $product) {
            $orderProducts[$product['id']] = [
                'quantity' => $product['quantity'],
                'price' => $product['price']
            ];
        }

        $order->products()->attach($orderProducts);

        return $order;
    }
}
