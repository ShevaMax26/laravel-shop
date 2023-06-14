<?php

namespace App\Http\Controllers\Blog\Post;

use App\Http\Controllers\Controller;
use App\Models\Blog\Category;

class CreateController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        return view('blog.post.create', compact('categories'));
    }
}
