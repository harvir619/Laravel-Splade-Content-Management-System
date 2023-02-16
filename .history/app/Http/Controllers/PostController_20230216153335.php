<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $categories = Post::class;

        // return view('categories.index',compact('categories'));

        return view('categories.index', [
            'categories' => SpladeTable::for($categories)
                ->column('name', sortable: true,)
                ->column('slug', label: 'Description', searchable: true)
                ->withGlobalSearch(columns: ['name', 'slug'])
                ->paginate(6),
        ]);
    }
}