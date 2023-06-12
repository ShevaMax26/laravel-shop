<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $productImages = $data['product_images'];

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

        foreach ($productImages as $productImage) {
            $filePath = Storage::disk('public')->put('images', $productImage);
            ProductImage::create([
                'product_id' => $product->id,
                'file_path' => $filePath,
            ]);
        }

        return redirect()->route('product.index');
    }
}
