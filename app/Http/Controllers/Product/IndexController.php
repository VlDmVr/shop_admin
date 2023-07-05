<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class IndexController extends Controller
{
    public function __invoke()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }
}
