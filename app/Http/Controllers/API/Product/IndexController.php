<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\API\Product\IndexRequest;
use App\Http\Resources\Product\ProductResource;

class IndexController extends Controller
{
    public function __invoke(IndexRequest $request)
    {
        $data = $request->validated();

        $products = Product::paginate(1, ['*'], 'page', $data['page']);
        return ProductResource::collection($products);
    }
}
