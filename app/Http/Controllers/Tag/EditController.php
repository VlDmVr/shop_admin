<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class EditController extends Controller
{
    public function __invoke(Tag $tag)
    {
        return view('tag.edit', compact('tag'));
    }
}
