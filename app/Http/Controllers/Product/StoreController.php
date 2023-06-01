<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $data['preview_image'] = Storage::disk('public')->put('images', $data['preview_image']);

        $product = Product::firstOrcreate([
            'title' => $data['title']
        ], $data);

        if (isset($data['tags'])) {
            $product->tags()->attach($data['tags']);
        }
        if (isset($data['colors'])) {
            $product->colors()->attach($data['colors']);
        }

        return redirect()->route('product.index');
    }
}
