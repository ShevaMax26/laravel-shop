<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();

        if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('images', $data['preview_image']);
        }

        if (isset($data['product_images'])) {
            $productImages = $data['product_images'];

            $product->productImages()->delete();

            foreach ($productImages as $productImage) {
                $filePath = Storage::disk('public')->put('images', $productImage);
                ProductImage::create([
                    'product_id' => $product->id,
                    'file_path' => $filePath,
                ]);
            }
        }
        $product->update($data);

        if (isset($data['tags'])) {
            $product->tags()->sync($data['tags'] ?? []);
        }

        if (isset($data['colors'])) {
            $product->colors()->sync($data['colors'] ?? []);
        }

        return redirect()->route('product.show', compact('product'));
    }
}
