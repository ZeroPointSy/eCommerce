<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Data\OrderData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\User\Order\StoreOrderRequest;
use App\Http\Requests\Api\V1\User\Order\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Services\OrderService;

class OrderController extends Controller
{
    public function __construct(
        public OrderService $orderService
    )
    {
    }

    public function index()
    {
        $order = $this->orderService->get();

        return response()->json([
            'success' => true,
            'message' => '',
            'data' => OrderResource::collection($order),
        ]);
    }


    public function store(StoreOrderRequest $request)
    {
        return response()->json([
            'success' => true,
            'message' => '',
            'data' => OrderResource::make($this->orderService->store(OrderData::from($request->validated()))),
        ]);

    }


    public function show(Order $order)
    {
        return response()->json([
            'success' => true,
            'message' => '',
            'data' => OrderResource::make($order)
        ]);

    }


    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order = $this->orderService->update(OrderData::from($request->validated()),$order);

        return response()->json([
            'success' => true,
            'message' => '',
            'data' => OrderResource::make($order)
        ]);
    }


    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json([
            'success' => true,
            'message' => '',
        ]);
    }
}
