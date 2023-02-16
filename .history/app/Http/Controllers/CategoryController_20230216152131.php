<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::class;

        // return view('categories.index',compact('categories'));

        return view('categories.index', [
            'categories' => SpladeTable::for($categories)
                ->column(key: 'name', sortable: true)
                ->column(key: 'slug', searchable: true, label: 'Description')
                ->paginate(6),
        ]);
    }
}
