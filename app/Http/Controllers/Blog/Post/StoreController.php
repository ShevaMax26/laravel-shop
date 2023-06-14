<?php

namespace App\Http\Controllers\Blog\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\Post\StoreRequest;
use App\Models\Blog\Post;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request, Post $post)
    {
        $data = $request->validated();

        $data['preview_image'] = Storage::disk('public')->put('images', $data['preview_image']);
        $data['main_image'] = Storage::disk('public')->put('images', $data['main_image']);
        Post::firstOrCreate($data);

        return redirect()->route('blog.post.index');
    }
}
