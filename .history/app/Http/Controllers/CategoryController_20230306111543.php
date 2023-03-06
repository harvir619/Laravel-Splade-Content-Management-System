<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
            'categories' => SpladeTable::for($categories)
                ->column('name', sortable: true,)
                ->column('slug', label: 'Description', searchable: true)
                ->column('action')
                ->withGlobalSearch(columns: ['name', 'slug'])
                ->paginate(6),
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
}
