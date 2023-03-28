<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::class;

        // return view('categories.index',compact('categories'));

        $globalSearch = AllowedFilter::callback('global',function($query,$value){
            $query
        })
        
        
        return view('posts.index', [
            'posts' => SpladeTable::for($posts)
                ->column('title', sortable: true,)
                ->column('slug', label: 'Description', searchable: true)
                ->withGlobalSearch(columns: ['title', 'slug'])
                ->paginate(6),
        ]);
    }
}