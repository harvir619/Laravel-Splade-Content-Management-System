<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Tables\Categories;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\Facades\Toast;
use App\Http\Requests\CategoryStoreRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::class;

        // return view('categories.index',compact('categories'));

        return view('categories.index', [
            // 'categories' => SpladeTable::for($categories)
            'categories' => Categories::class,
        ]);
    }

    public function create()
    {
        return view('categories.create');
    }
    public function store(CategoryStoreRequest $request)
    {
        Category::create($request->validated());
        Toast::title('Category has been created');
        return redirect()->route('categories.index');
    }
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(CategoryStoreRequest $request, Category $category)
    {

        $category->update($request->validated());
        Toast::title('Category Updated Succesfully');

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        Toast::success('Category Deleted Succesfully');

        return redirect()->back();
    }
}
