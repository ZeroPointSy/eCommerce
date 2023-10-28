<?php


namespace App\Services;

use App\Models\Category;


class CategoryService
{

    public function get()
    {
        return Category::all();
    }

    public function store(CategoryData $data)
    {
        return $category = Category::create($data->toArray());
    }


    public function update(Category $category,CategoryData $data)
    {
        $category->update($data->toArray());

        return $category;
    }


    public function delete(Category $category)
    {
        $category->delete();

    }
}
