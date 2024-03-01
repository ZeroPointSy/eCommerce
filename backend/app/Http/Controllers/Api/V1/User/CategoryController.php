<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Data\CategoryData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\User\Category\StoreCategoryRequest;
use App\Http\Requests\Api\V1\User\Category\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    public function __construct(
        public CategoryService $categoryService
    )
    {
    }

    public function index()
    {
        $category = $this->categoryService->get();

        return response()->json([
            'success' => true,
            'message' => '',
            'data' => CategoryResource::collection($category),
        ]);
    }


    public function store(StoreCategoryRequest $request)
    {
        return response()->json([
            'success' => true,
            'message' => '',
            'data' => CategoryResource::make($this->categoryService->store(CategoryData::from($request->validated()))),
        ]);

    }


    public function show(Category $category)
    {
        return response()->json([
            'success' => true,
            'message' => '',
            'data' => CategoryResource::make($category)
        ]);

    }


    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category = $this->categoryService->update(CategoryData::from($request->validated()),$category);

        return response()->json([
            'success' => true,
            'message' => '',
            'data' => CategoryResource::make($category)
        ]);
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json([
            'success' => true,
            'message' => '',
        ]);
    }
}
