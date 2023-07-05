<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class ShowController extends Controller
{
    public function __invoke(Tag $tag)
    {
        return view('tag.show', compact('tag'));
    }
}
