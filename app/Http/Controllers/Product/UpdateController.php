<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();

        $data['preview_image'] = Storage::disk('public')->put('images', $data['preview_image']);
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
