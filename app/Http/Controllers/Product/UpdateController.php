<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\ColorProduct;
use File;
use Storage;

class UpdateController extends Controller
{
    private $tagsId = null;
    private $colorsId = null;

    public function __invoke(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();

        if(isset($data['preview_image']) && is_object($data['preview_image']) && $data['preview_image']->getClientOriginalName())
        {
            
            $data['preview_image'] = $data['preview_image'];
            
            if(Storage::disk('public')->exists($product->preview_image)) {
            
                Storage::disk('public')->delete($product->preview_image);
            }
            
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        }
        
        if(isset($data['tags'])) 
            $this->tagsId = $data['tags'];
        if(isset($data['colors']))
            $this->colorsId = $data['colors'];

        unset($data['tags'], $data['colors']);
        
        $product->update($data);

        ProductTag::where('product_id', $product->id)->delete();
        
        if(isset($this->tagsId)) {
            foreach($this->tagsId as $tagId) {
                ProductTag::firstOrCreate([
                    'product_id' => $product->id,
                    'tag_id' => $tagId
                ]);
            }
        }
        
        ColorProduct::where('product_id', $product->id)->delete();

        if(isset($this->colorsId)) {
            foreach($this->colorsId as $colorId) {
                ColorProduct::firstOrCreate([
                    'product_id' => $product->id,
                    'color_id' => $colorId
                ]);
            }
        }

        return redirect()->route('product.show', $product->id);
    }
}
