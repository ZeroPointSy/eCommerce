<?php

namespace App\Services;

use App\Data\CategoryData;
use App\Models\Category;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CategoryService
{
    public function get()
    {
        $category = QueryBuilder::for(Category::query())
            ->allowedFilters([
                AllowedFilter::callback('search',function ($query, $value) {
                    $query->where('full_name', 'like' , "%$value%")
                    ->orWhere('description', 'like', "%$value%");
                })
            ])
            ->paginate(request()->query('perPage'));

        return $category;
    }

    public function store(CategoryData $data)
    {
        $category = Category::create($data->toArray());

        $category->refresh();

        return $category;
    }

    public function update(CategoryData $data,Category $category)
    {
        $category->update($data->toArray());

        return $category;
    }
    public function delete(Category $category)
    {
        $category->delete();
    }
}
