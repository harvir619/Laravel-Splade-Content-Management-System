<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;

class PostController extends Controller
{
    public function index()
    {
        $categories = Post::class;

        // return view('categories.index',compact('categories'));

        return view('categories.index', [
            'post' => SpladeTable::for($post)
                ->column('title', sortable: true,)
                ->column('slug', label: 'Description', searchable: true)
                ->withGlobalSearch(columns: ['title', 'slug'])
                ->paginate(6),
        ]);
    }
}