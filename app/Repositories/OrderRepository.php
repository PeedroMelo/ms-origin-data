<?php

namespace App\Repositories;

use App\Repositories\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{
    private $filePath;

    function __construct()
    {
        $this->filePath = \file_get_contents(__DIR__ . '/../../storage/app/json/SampleA.json');
    }

    public function getAll()
    {
        return json_decode($this->filePath, true);
    }
}