<?php

namespace App\Http\Controllers\Color;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;

class IndexController extends Controller
{
    public function __invoke()
    {
        $colors = Color::all();
        return view('color.index', compact('colors'));
    }
}
