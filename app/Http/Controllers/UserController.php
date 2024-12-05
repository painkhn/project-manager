<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\{ User };
use Auth;
use Inertia\Inertia;


class UserController extends Controller
{
    public function profile_index($name)
    {
        $user = User::where('name', $name)->first();
        return Inertia::render('Profile', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'user' => $user
        ]);
    }
}
