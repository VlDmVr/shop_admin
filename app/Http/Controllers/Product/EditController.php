<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Color;
use App\Models\Category;
use App\Models\ProductTag;
use App\Models\ColorProduct;

class EditController extends Controller
{
    public function __invoke(Product $product, ProductTag $productTag, ColorProduct $colorProduct)
    {
        $tags = Tag::all();
        $colors = Color::all();
        $categories = Category::all();
        $productTags = $productTag->where('product_id', $product->id)->get();
        
        $colorProducts = $colorProduct->where('product_id', $product->id)->get();
        
        return view('product.edit', compact('product', 'tags', 'colors', 'categories', 'productTags', 'colorProducts'));
    }
}
