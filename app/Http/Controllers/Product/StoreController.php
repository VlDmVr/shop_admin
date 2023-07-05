<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\ColorProduct;
use Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);

        $tagsId = $data['tags'];
        $colorsId = $data['colors'];
        unset($data['tags'], $data['colors']);

        $product = Product::firstOrCreate([
            'title' => $data['title']
        ], $data);

        foreach($tagsId as $tagId) {
            ProductTag::firstOrCreate([
                'product_id' => $product->id,
                'tag_id' => $tagId
            ]);
        }

        foreach($colorsId as $colorId) {
            ColorProduct::firstOrCreate([
                'product_id' => $product->id,
                'color_id' => $colorId
            ]);
        }

        return redirect()->route('product.index');
    }
}
