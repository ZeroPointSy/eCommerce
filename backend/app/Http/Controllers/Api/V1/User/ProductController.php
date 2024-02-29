<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Data\ProductData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\User\Product\StoreProductRequest;
use App\Http\Requests\Api\V1\User\Product\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\ProductService;

class ProductController extends Controller
{
    public function __construct(
        public ProductService $productService
    )
    {
    }

    public function index()
    {
        $product = $this->productService->get();

        return response()->json([
            'success' => true,
            'message' => '',
            'data' => ProductResource::collection($product),
        ]);
    }


    public function store(StoreProductRequest $request)
    {
        return response()->json([
            'success' => true,
            'message' => '',
            'data' => ProductResource::make($this->productService->store(ProductData::from($request->validated()))),
        ]);

    }


    public function show(Product $product)
    {
        return response()->json([
            'success' => true,
            'message' => '',
            'data' => ProductResource::make($product)
        ]);

    }


    public function update(UpdateProductRequest $request, Product $product)
    {
        $product = $this->productService->update(ProductData::from($request->validated()),$product);

        return response()->json([
            'success' => true,
            'message' => '',
            'data' => ProductResource::make($product)
        ]);
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'success' => true,
            'message' => '',
        ]);
    }
}
