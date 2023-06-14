<?php

namespace App\Http\Controllers\Blog\Post;

use App\Http\Controllers\Controller;
use App\Models\Blog\Category;
use App\Models\Blog\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::all();

        return view('blog.post.index', compact('posts'));
    }
}
