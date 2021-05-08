<?php

namespace App\Services;

use App\Repositories\OrderRepository;

class OrderService
{
    private $orders;

    public function __construct($sample)
    {
        $this->orders = new OrderRepository($sample);
    }

    public function getOrders($filter = [])
    {
        $orders = $this->orders->getAll([
            'status'   => isset($filter['status'])   ? $filter['status']   : '',
            'page'     => isset($filter['page'])     ? $filter['page']     : 1,
            'per_page' => isset($filter['per_page']) ? $filter['per_page'] : 15
        ]);

        $final = [
            'total' => count($orders),
            'list' => $orders
        ];
        
        return $final;
    }
}