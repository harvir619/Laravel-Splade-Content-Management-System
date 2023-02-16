<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        
        // return view('categories.index',compact('categories'));
        
        return view('categories.index', [
            'categories'=>SpladeTable::for($categories)
            ->column('name')
            ->column('slug')
    ]);
    }
}