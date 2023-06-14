<?php

namespace App\Http\Controllers\Blog\Post;

use App\Http\Controllers\Controller;
use App\Models\Blog\Post;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        return view('blog.post.show', compact('post'));
    }
}
