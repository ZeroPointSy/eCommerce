<?php

namespace App\Services;

use App\Data\ProductData;
use App\Models\Product;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ProductService
{
    public function get()
    {
        $product = QueryBuilder::for(Product::query())
            ->allowedFilters([
                AllowedFilter::callback('search',function ($query, $value) {
                    $query->where('name', 'like' , "%$value%")
                    ->orWhere('description', 'like' , "%$value%");
                })
            ])
            ->with('category')
            ->paginate(request()->query('perPage'));

        return $product;
    }

    public function store(ProductData $data)
    {
        $product = Product::create($data->toArray());

        $product->refresh();

        return $product;
    }

    public function update(ProductData $data,Product $product)
    {
        $product->update($data->toArray());

        return $product;
    }
    public function delete(Product $product)
    {
        $product->delete();
    }
}
