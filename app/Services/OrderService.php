<?php

namespace App\Services;

use App\Repositories\OrderRepository;

class OrderService
{
    private $order;
    private $orders;

    public function __construct()
    {
        $this->orders = new OrderRepository;
    }

    public function getOrders($filter = [])
    {
        $orders = $this->orders->getAll();
        
        return $orders;
    }
}