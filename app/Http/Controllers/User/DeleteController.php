<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DeleteController extends Controller
{
    public function __invoke(User $user)
    {
        $user->delete();

        return redirect()->route('user.index');
    }
}
