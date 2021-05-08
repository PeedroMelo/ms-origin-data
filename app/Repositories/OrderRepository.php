<?php

namespace App\Repositories;

use App\Repositories\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{
    private $filePath;

    function __construct($sample)
    {
        $sample = \strtoupper($sample);
        $this->filePath = \file_get_contents(__DIR__ . "/../../storage/app/json/Sample{$sample}.json");
    }

    public function getAll($filter = [])
    {
        $orders = json_decode($this->filePath, true);

        if (count($filter) > 0) {
            $status = isset($filter['status']) ? $filter['status'] : '';
            if ($status !== '') {
                $orders = array_filter($orders, function ($order) use ($filter) {
                    return $order['status'] == $filter['status'];
                });
                $orders = array_values($orders);
            }
        }

        $orders = array_chunk($orders, $filter['per_page'], true);

        return $orders[$filter['page']-1];
    }
}