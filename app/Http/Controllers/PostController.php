<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::class;

        // return view('categories.index',compact('categories'));

        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('title', 'LIKE', "%{$value}%")
                        ->orWhere('slug', 'LIKE', "%{$value}%");
                });
            });
        });

        $posts = QueryBuilder::for(Post::class)
            ->defaultSort('title')
            ->allowedSorts(['title', 'slug'])
            ->allowedFilters(['title', 'slug', 'category_id', $globalSearch]);

        $categories = Category::pluck('name', 'id')->toArray();
        return view('posts.index', [
            'posts' => SpladeTable::for($posts)
                ->column('title', sortable: true,)
                ->column('slug', label: 'Description', searchable: true)
                ->column('action')
                ->withGlobalSearch(columns: ['title', 'slug'])
                ->selectFilter('category_id', $categories)
                ->paginate(8),
        ]);
    }
}
