<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Models\Category;
use App\Data\CategoryData;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Requests\Api\V1\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Api\V1\Admin\Category\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function __construct(public CategoryService $categoryService){}


    public function index()
    {
        $categories = $this->categoryService->get();

        return response()->json(
            CategoryResource::collection($categories)
        );
    }

    public function show(Category $category)
    {
        return response()->json(
            CategoryResource::make($category)
        );
    }

    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();

        $category = $this->categoryService->store(CategoryData::from($validated));

        return response()->json(
            CategoryResource::make($category)
        );
    }

    public function update(Category $category, UpdateCategoryRequest $request)
    {
        $validated = $request->validated();

        $category = $this->categoryService->update($category,CategoryData::from($validated));

        return response()->json(
            CategoryResource::make($category)
        );
    }

    public function delete(Category $category)
    {
        $this->categoryService->delete($category);

        return response()->json(
            'true'
        );
    }

}
