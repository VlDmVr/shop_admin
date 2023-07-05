<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ShowController extends Controller
{
    public function __invoke(Product $product)
    {
        return view('product.show', compact('product'));
    }
}
