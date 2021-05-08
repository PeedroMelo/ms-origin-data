<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Helpers\QueryParametersSerializer;

class OrderController extends Controller
{
    private $orders;
    private $query;

    public function index(Request $request, $sample)
    {
        $this->query = QueryParametersSerializer::serializeParams($request->fullUrl());

        $order = new OrderService($sample);

        return response(
            $order->getOrders($this->query),
            200
        );
    }
}
