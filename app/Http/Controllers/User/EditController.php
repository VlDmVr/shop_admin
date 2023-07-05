<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class EditController extends Controller
{
    public function __invoke(User $user)
    {
        return view('user.edit', compact('user'));
    }
}
