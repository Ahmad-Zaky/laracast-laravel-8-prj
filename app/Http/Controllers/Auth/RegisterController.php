<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\RegisterStoreRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register.create');
    }

    public function store(RegisterStoreRequest $request)
    {
        User::create($request->validated());

        return redirect()->route('posts.index');
    }
}
