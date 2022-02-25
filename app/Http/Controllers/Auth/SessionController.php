<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\Auth\RegisterStoreRequest;
use App\Models\User;

class SessionController extends Controller
{
    public function register(RegisterStoreRequest $request)
    {
        if ($request->isMethod('post')) {
            if ($user = User::create($request->validated())) {
                auth()->login($user); 
            }
    
            return redirect()->route('posts.index')->with('success', 'Your Account has been Created');
        }
        return view('auth.register');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            
            $credentials = $request->only('email', 'password');
            if (! auth()->attempt($credentials)) {
                throw ValidationException::withMessages([
                    'email' => "Your Credentials Couldn't be verified, please try again with correct credentials !"
                ]);
            }

            session()->regenerate();
            return redirect()->route('posts.index')->with('success', 'Welcome, '. auth()->user()->name. ' !');

        }

        return view('auth.login');
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye !');
    }
}
