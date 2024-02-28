<?php

namespace App\Services;

use App\Data\OrderData;
use App\Models\Order;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class OrderService
{
    public function get()
    {
        $order = QueryBuilder::for(Order::query()->latest())
            ->allowedFilters([
                AllowedFilter::callback('search',function ($query, $value) {
                    $query->where('full_name', 'like' , "%$value%");
                })
            ])
            ->paginate(request()->query('perPage'));

        return $order;
    }

    public function store(OrderData $data)
    {
        $order = Order::create($data->toArray());

        $order->refresh();

        return $order;
    }

    public function update(OrderData $data,Order $order)
    {
        $order->update($data->toArray());

        return $order;
    }
    public function delete(Order $order)
    {
        $order->delete();
    }
}
